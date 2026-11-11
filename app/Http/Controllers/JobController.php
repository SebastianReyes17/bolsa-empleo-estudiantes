<?php
namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class JobController extends Controller
{
    public function index(Request $request) {
        $jobs = Job::with('company')->where('is_active',true)
            ->when($request->filled('q'), fn($q) => $q->where(fn($w) => $w->where('title','like','%'.$request->q.'%')->orWhere('company_name','like','%'.$request->q.'%')->orWhere('description','like','%'.$request->q.'%')))
            ->when($request->filled('location'), fn($q) => $q->where('location','like','%'.$request->location.'%'))
            ->when($request->filled('modality'), fn($q) => $q->where('modality',$request->modality))
            ->latest()->paginate(9)->withQueryString();
        return view('jobs.index', compact('jobs'));
    }
    public function show(Job $job) { abort_unless($job->is_active,404); $job->load('company'); $alreadyApplied = Auth::check() && Auth::user()->applications()->where('job_id',$job->id)->exists(); return view('jobs.show', compact('job','alreadyApplied')); }
    public function create() { $this->authorizeCompany(); return view('jobs.create'); }
    public function store(Request $request) {
        $this->authorizeCompany(); $data = $this->validateJob($request); $data['company_id'] = Auth::id(); $data['company_name'] = Auth::user()->name; Job::create($data);
        return redirect()->route('dashboard')->with('success','Vacante publicada correctamente.');
    }
    public function edit(Job $job) { $this->owns($job); return view('jobs.edit', compact('job')); }
    public function update(Request $request, Job $job) { $this->owns($job); $data=$this->validateJob($request); $data['company_name']=Auth::user()->name; $job->update($data); return redirect()->route('dashboard')->with('success','Vacante actualizada.'); }
    public function destroy(Job $job) { $this->owns($job); $job->update(['is_active'=>false]); return redirect()->route('dashboard')->with('success','La vacante fue desactivada.'); }
    private function validateJob(Request $r): array { return $r->validate(['title'=>'required|string|max:150','location'=>'required|string|max:120','modality'=>'required|in:Presencial,Remoto,Híbrido','type'=>'required|in:Tiempo completo,Medio tiempo,Práctica,Freelance','description'=>'required|string|min:30','requirements'=>'nullable|string','salary'=>'nullable|string|max:100','expires_at'=>'nullable|date|after_or_equal:today']); }
    private function authorizeCompany(): void { abort_unless(Auth::user()?->role === 'company',403); }
    private function owns(Job $job): void { abort_unless(Auth::id() === $job->company_id,403); }
}

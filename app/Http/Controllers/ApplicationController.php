<?php
namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ApplicationController extends Controller
{
    public function store(Request $request, Job $job) {
        abort_unless(Auth::user()->role === 'student',403); abort_unless($job->is_active,404);
        $data=$request->validate(['cover_letter'=>'nullable|string|max:1500']);
        if (Auth::user()->applications()->where('job_id',$job->id)->exists()) return back()->with('error','Ya te postulaste a esta vacante.');
        Application::create(['job_id'=>$job->id,'user_id'=>Auth::id(),'cover_letter'=>$data['cover_letter'] ?? null]);
        return redirect()->route('applications.index')->with('success','¡Tu postulación fue enviada!');
    }
    public function index() { $applications=Auth::user()->applications()->with('job')->latest()->get(); return view('applications.index',compact('applications')); }
    public function updateStatus(Request $request, Application $application) {
        abort_unless(Auth::user()->role==='company' && $application->job->company_id===Auth::id(),403);
        $data=$request->validate(['status'=>'required|in:En revisión,Preseleccionado,Rechazado,Seleccionado']); $application->update($data);
        return back()->with('success','Estado de la postulación actualizado.');
    }
}

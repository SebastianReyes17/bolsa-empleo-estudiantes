<?php
namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function __invoke() {
        $user = Auth::user();
        if ($user->role === 'company') { $jobs = $user->jobs()->withCount('applications')->latest()->get(); return view('dashboard', compact('jobs')); }
        $applications = $user->applications()->with('job')->latest()->get();
        $suggestedJobs = Job::where('is_active', true)->latest()->take(4)->get();
        return view('dashboard', compact('applications','suggestedJobs'));
    }
}

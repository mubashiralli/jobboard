<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job\Job;
use App\Models\Job\SavedJob;
use App\Models\Job\Application;
use Auth;

class JobsController extends Controller
{
    //
    public function jobView($id)
    {
        $job = Job::find($id);
        $relevantJobs = Job::where("id", "!=", $id)->where("category", $job->category)->take(5)->get();
        $savedjob = SavedJob::where("job_id", $id)->where('user_id', Auth::user()->id);

        if ($savedjob->count() > 0) {
            $status = true;
        } else {
            $status = false;
        }
        $job->responsibilities = explode(',', $job->responsibilities);
        $job->education_experience = explode(',',$job->education_experience);
        $job->otherbenefits = explode(',',$job->otherbenefits);
        $totalJobs = $relevantJobs->count();
        $isapplied = Application::where('user_id', Auth::user()->id)->where('job_id', $id);
        if ($isapplied->count() > 0) {
            $isapplied = true;
        } else {
            $isapplied = false;
        }
        return view('jobs.job', compact('job', 'relevantJobs', 'totalJobs', 'status', 'isapplied'));
    }

    public function saveJob(Request $request)
    {
        $saveJob = SavedJob::create(
            [
                'user_id' => $request->user()->id,
                'job_id' => $request->job_id
            ]
        );
        if ($saveJob) {
            return redirect('/job/single/' . $request->job_id)->with('save', 'Job saved successfully');
        }


    }
    public function applyJob(Request $request)
    {
        if ($request->retract == "yes") {
            $job = Application::where('job_id', $request->job_id)->where('user_id', Auth::user()->id);
            $job->delete();
            return redirect('/job/single/' . $request->job_id)->with('applied', 'Job has been Retracted!');
        }
        $applied_job = Application::create(
            [
                'user_id' => Auth::user()->id,
                'job_id' => $request->job_id
            ]

        );
        if ($applied_job) {
            return redirect('/job/single/' . $request->job_id)->with('applied', 'Successfully applied!');
        }
    }
}

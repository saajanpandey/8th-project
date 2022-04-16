<?php

namespace App\Http\Controllers\welcome;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function candidates()
    {
        $users = User::count();
        return $users;
    }
    public function jobPosted()
    {
        $jobs = Job::where('status', 1)->count();
        return $jobs;
    }

    public function companies()
    {
        $employers = Employer::count();
        return $employers;
    }
    public function jobList()
    {
        $jobsList = Job::where('status', 1)->paginate(4);
        return $jobsList;
    }
    public function singleJob($id)
    {
        $job = Job::find($id);
        return view('frontend.singleJob', compact('job'));
    }
}

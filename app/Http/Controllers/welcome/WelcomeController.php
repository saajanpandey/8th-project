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
}

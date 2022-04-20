<?php

namespace App\Http\Controllers\welcome;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Models\Employer;
use App\Models\Job;
use App\Models\JobCategories;
use App\Models\JobType;
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
    public function searchJob(Request $request)
    {
        $data = $request->all();
        $title = $data['title'];
        $searchData = Job::where('title', 'ILIKE', '%' . $data['title'] . '%')->orWhere('city_id', $data['city_id'])->orWhere('type_id', $data['type_id'])->paginate(8);
        return view('frontend.search', compact('searchData', 'title'));
    }
    public function advanceSearch(SearchRequest $request)
    {
        $data = $request->all();
        $title = $data['title'];
        $searchData = Job::where('title', 'ILIKE', '%' . $data['title'] . '%')
            ->orWhere('experience', $data['experience'])
            ->orWhere('category_id', $data['category_id'])
            ->orWhere('city_id', $data['city_id'])
            ->orWhere('type_id', $data['type_id'])
            ->paginate(8);
        return view('frontend.search', compact('searchData', 'title'));
    }
    public function jobTypes()
    {
        $data = JobType::all();
        return $data;
    }
    public function categories()
    {
        $data = JobCategories::all();
        return $data;
    }
}

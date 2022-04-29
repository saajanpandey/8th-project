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
        $query = Job::query();
        if (isset($data['title']) && $data['title'] != null) {
            $query->where('title', 'ILIKE', '%' . $data['title'] . '%');
        }
        if (isset($data['city_id']) && $data['city_id'] != null) {
            $query->orWhere('city_id', $data['city_id']);
        }
        if (isset($data['type_id']) && $data['type_id'] != null) {
            $query->orWhere('type_id', $data['type_id']);
        }
        $searchData = $query->orderBy('title', 'ASC')->paginate(8);
        return view('frontend.search', compact('searchData', 'title'));
    }
    public function advanceSearch(Request $request)
    {
        $data = $request->all();
        $title = $data['title'];
        $query = Job::query();
        if (isset($data['title']) && $data['title'] != null) {
            $query->where('title', 'ILIKE', '%' . $data['title'] . '%');
        }
        if (isset($data['city_id']) && $data['city_id'] != null) {
            $query->orWhere('city_id', $data['city_id']);
        }
        if (isset($data['type_id']) && $data['type_id'] != null) {
            $query->orWhere('type_id', $data['type_id']);
        }
        if (isset($data['experience']) && $data['experience'] != null) {
            $query->orWhere('experience', $data['experience']);
        }
        if (isset($data['category_id']) && $data['category_id'] != null) {
            $query->orWhere('category_id', $data['category_id']);
        }
        $searchData = $query->orderBy('title', 'ASC')->paginate(8);;
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

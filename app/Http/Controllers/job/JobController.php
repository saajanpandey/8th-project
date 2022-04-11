<?php

namespace App\Http\Controllers\job;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\City;
use App\Models\Employer;
use App\Models\Job;
use App\Models\JobCategories;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::paginate(10);
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Employer::orderBy('company_name', 'ASC')->where('status', true)->get();
        $jobTypes = JobType::orderBy('name', 'ASC')->get();
        $categories = JobCategories::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();
        return view('jobs.create', compact('companies', 'jobTypes', 'categories', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        $data = $request->except('_token');
        Job::create($data);
        return redirect()->route('job.index')->with('create', '');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        $companies = Employer::orderBy('company_name', 'ASC')->where('status', true)->get();
        $jobTypes = JobType::orderBy('name', 'ASC')->get();
        $categories = JobCategories::orderBy('name', 'ASC')->get();
        $cities = City::orderBy('name', 'ASC')->get();
        return view('jobs.edit', compact('job', 'companies', 'jobTypes', 'categories', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, $id)
    {
        $job = Job::find($id);
        $data = $request->except('_token');
        $job->fill($data)->save();
        return redirect()->route('job.index')->with('update', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();
        return redirect()->route('job.index')->with('delete', '');
    }
}

@extends('layouts.frontend')
@section('title', 'View Job')
@section('contents')
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('/frontend/images/hero_1.jpg');"
        id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">{{ $job->title }}</h1>
                    <div class="custom-breadcrumbs">
                        <a href="{{ url('/') }}">Home</a> <span class="mx-2 slash">/</span>
                        <a href="#">Job</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>{{ $job->title }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="site-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="border p-2 d-inline-block mr-3 rounded">
                            <img src="{{ asset('/uploads/logo/' . $job->company->image) }}" alt="Image"
                                style="width: 150px;height:150px">
                        </div>
                        <div>
                            <h2>{{ $job->title }}</h2>
                            <div>
                                <span class="ml-0 mr-2 mb-2"><span
                                        class="icon-briefcase mr-2"></span>{{ $job->company->company_name }}</span>
                                <span class="m-2"><span
                                        class="icon-room mr-2"></span>{{ $job->city->name }}</span>
                                <span class="m-2"><span class="icon-clock-o mr-2"></span><span
                                        class="text-primary">{{ $job->type->name }}</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <a href="#" class="btn btn-block btn-primary btn-md">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                class="icon-align-left mr-3"></span>Job Description</h3>
                        <p>{!! $job->description !!}</p>
                    </div>
                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                class="icon-rocket mr-3"></span>Responsibilities</h3>
                        <p>{!! $job->responsibilities !!}</p>
                    </div>

                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                class="icon-book mr-3"></span>Education + Experience</h3>
                        <p>{!! $job->education_experience !!}</p>
                    </div>

                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                class="icon-turned_in mr-3"></span>Other Benifits</h3>
                        <p>{!! $job->benefits !!}</p>
                    </div>

                    <div class="row mb-5">
                        <div class="col-6">
                            <a href="#" class="btn btn-block btn-primary btn-md">Apply Now</a>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="bg-light p-3 border rounded mb-4">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
                        <ul class="list-unstyled pl-3 mb-0">
                            <li class="mb-2"><strong class="text-black">Job Category</strong>
                                {{ $job->category->name }}
                            </li>
                            <li class="mb-2"><strong class="text-black">Published on:</strong>
                                {{ $job->created_at->format('F d, Y') }}
                            </li>
                            <li class="mb-2"><strong class="text-black">Vacancy:
                                </strong>{{ $job->openings }}
                            </li>
                            <li class="mb-2"><strong class="text-black">Employment Status:</strong>
                                {{ $job->type->name }}
                            </li>
                            <li class="mb-2"><strong class="text-black">Experience:</strong>
                                {{ $job->experience }}
                            </li>
                            <li class="mb-2"><strong class="text-black">Job
                                    Location: </strong>{{ $job->city->name }}
                            </li>
                            <li class="mb-2"><strong class="text-black">Salary: </strong>{{ $job->salary }}
                            </li>
                            <li class="mb-2"><strong class="text-black">Application Deadline:</strong>
                                {{ \Carbon\Carbon::parse($job->expiry_date)->format('F d, Y') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

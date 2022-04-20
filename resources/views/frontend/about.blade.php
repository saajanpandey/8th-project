@extends('layouts.frontend')
@section('title', 'About Us')
@section('contents')
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('/frontend/images/hero_1.jpg');"
        id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">About Us</h1>
                    <div class="custom-breadcrumbs">
                        <a href="{{ url('/') }}">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>About Us</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay" id="next-section" style="">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2 text-white">JobFinder Site Stats</h2>
                </div>
            </div>
            <div class="row pb-0 block__19738 section-counter">

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="1930">0</strong>
                    </div>
                    <span class="caption">Candidates</span>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="54">0</strong>
                    </div>
                    <span class="caption">Jobs Posted</span>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="120">0</strong>
                    </div>
                    <span class="caption">Jobs Filled</span>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="550">0</strong>
                    </div>
                    <span class="caption">Companies</span>
                </div>


            </div>
        </div>
    </section>


    <section class="site-section pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <a data-fancybox data-ratio="2" href="https://vimeo.com/317571768" class="block__96788">
                        <span class="play-icon"><span class="icon-play"></span></span>
                        <img src="images/sq_img_6.jpg" alt="Image" class="img-fluid img-shadow">
                    </a>
                </div>
                <div class="col-lg-5 ml-auto">
                    <h2 class="section-title mb-3">WHO WE ARE</h2>
                    <p class="lead">
                        Job Finder is the website for all the professionals, amateurs and interns to seek and post any sort
                        of jobs based on different categories. Here jobs from programming to photography, monthly to hour
                        based, every job can be secured by a genuine source and verified users having account at Job Finder.
                        We tend to serve our users by delivering exactly what they are seeking for without any middleman
                        hassles. This portal is curated for job-holders to freelancers to absolute new-bies where everyone
                        can find any sort of jobs based on their academic qualifications and expertise.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

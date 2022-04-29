@extends('layouts.frontend')
@section('title', 'Job Search')
@section('contents')
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('/frontend/images/search.jpeg');"
        id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Job Search</h1>
                </div>
            </div>
        </div>
    </section>
    @if ($searchData->isEmpty())
        <div class="container" style="padding-top: 100px; padding-bottom: 100px;text-align: center;">
            No Data Found!
        </div>
    @else
        <section class="site-section">
            <div class="container">

                <ul class="job-listings mb-5">
                    @foreach ($searchData as $list)
                        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                            <a href="{{ route('single.job.view', $list->id) }}"></a>
                            <div class="job-listing-logo">
                                <img src="{{ asset('/uploads/logo/' . $list->company->image) }}" alt="Company Logo"
                                    class="img-fluid" style="width: 150px;height:150px">
                            </div>

                            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                    <h2>{{ $list->title }}</h2>
                                    <strong>{{ $list->company->company_name }}</strong>
                                </div>
                                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                    <span class="icon-room"></span> {{ $list->city->name }}
                                </div>
                                <div class="job-listing-meta">
                                    <span class="badge badge-success">{{ $list->type->name }}</span>
                                </div>
                            </div>

                        </li>
                    @endforeach
                </ul>

                <div class="row pagination-wrap">
                    <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
                        <span>Showing {{ $searchData->firstItem() }} - {{ $searchData->lastItem() }} of
                            {{ $searchData->total() }} Jobs</span>
                    </div>
                    {!! $searchData->links() !!}
                </div>
            </div>
        </section>
    @endif
@endsection

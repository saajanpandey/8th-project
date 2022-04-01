@extends('admin.sidebar')
@section('title', 'Edit Job')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Job</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dash') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Job</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Job</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('job.update', $job->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="inputName">Job Title</label>
                            <input type="text" id="inputName" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{ $job->title }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">Company</label>
                            <select class="custom-select form-control @error('company_id') is-invalid @enderror"
                                name="company_id">
                                <option selected disabled>Select Company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" @if (old('company_id') == $company->id || $company->id == $job->company_id) selected @endif>
                                        {{ $company->company_name }}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">Job Type</label>
                            <select class="custom-select form-control @error('type_id') is-invalid @enderror"
                                name="type_id">
                                <option selected disabled>Select Job Type</option>
                                @foreach ($jobTypes as $jobType)
                                    <option value="{{ $jobType->id }}" @if (old('type_id') == $jobType->id || $jobType->id == $job->type_id) selected @endif>
                                        {{ $jobType->name }}</option>
                                @endforeach
                            </select>
                            @error('type_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">Job Category</label>
                            <select class="custom-select form-control @error('category_id') is-invalid @enderror"
                                name="category_id">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if (old('category_id') == $category->id || $category->id == $job->category_id) selected @endif>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputName">Experience</label>
                            <input type="number" id="inputName"
                                class="form-control @error('experience') is-invalid @enderror" name="experience"
                                value="{{ $job->experience }}">
                            @error('experience')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">Openings</label>
                            <input type="number" id="inputName" class="form-control @error('openings') is-invalid @enderror"
                                name="openings" value="{{ $job->openings }}">
                            @error('openings')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">Expiry Date</label>
                            <input type="text" id="date" class="form-control @error('expiry_date') is-invalid @enderror"
                                name="expiry_date" value="{{ $job->expiry_date }}">
                            @error('expiry_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">City</label>
                            <select class="custom-select form-control @error('city_id') is-invalid @enderror"
                                name="city_id">
                                <option selected disabled>Select City</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" @if (old('city_id') == $city->id || $city->id == $job->city_id) selected @endif>
                                        {{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">Salary</label>
                            <input type="text" id="inputName" class="form-control @error('salary') is-invalid @enderror"
                                name="salary" value="{{ $job->salary }}">
                            @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">Job Description</label>
                            <textarea id="jobD" name="description">
                               {{ $job->description }}
                              </textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">Job Specification</label>
                            <textarea id="specification" name="specification">
                               {{ $job->specification }}
                              </textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Status</label>
                            <select id="inputStatus"
                                class="form-control custom-select @error('status') is-invalid @enderror" name="status">
                                <option selected disabled>Select one</option>
                                <option value="1" @if ($job->status == 1) selected @endif>Enable</option>
                                <option value="0" @if ($job->status == 0) selected @endif>Disable</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('job.index') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Create" class="btn btn-success float-right">
                </div>
            </div>
            <!-- /.card -->
            </form>
        </section>
    </div>
@endsection
@section('scripts')
    <script>
        $('#date').daterangepicker({
            singleDatePicker: true,
            "locale": {
                "format": "YYYY-MM-DD",
            },
            autoApply: true,
        });

        $('#specification').summernote({
            height: 400,
        })
        $('#jobD').summernote({
            height: 400,
        })
    </script>

@endsection

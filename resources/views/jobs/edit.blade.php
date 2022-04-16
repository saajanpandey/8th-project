@extends('employer.sidebar')
@section('title', 'Edit Job')
@section('contents')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Edit Job</h6>
            <form method="POST" action="{{ route('job.update', $job->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="inputName">Job Title</label>
                    <input type="text" id="inputName" class="form-control @error('title') is-invalid @enderror" name="title"
                        value="{{ $job->title }}">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName">Job Type</label>
                    <select class="form-select mb-3 @error('type_id') is-invalid @enderror" name="type_id">
                        <option selected disabled>Select Job Type</option>
                        @foreach ($jobTypes as $jobType)
                            <option value="{{ $jobType->id }}" @if (old('type_id') == $jobType->id || $jobType->id == $job->type_id) selected @endif>
                                {{ $jobType->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputName">Job Category</label>
                    <select class="form-select mb-3 @error('category_id') is-invalid @enderror" name="category_id">
                        <option selected disabled>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if (old('category_id') == $category->id || $category->id == $job->category_id) selected @endif>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName">Experience</label>
                    <input type="number" id="inputName" class="form-control @error('experience') is-invalid @enderror"
                        name="experience" value="{{ $job->experience }}">
                    @error('experience')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName">Openings</label>
                    <input type="number" id="inputName" class="form-control @error('openings') is-invalid @enderror"
                        name="openings" value="{{ $job->openings }}">
                    @error('openings')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName">Expiry Date</label>
                    <input type="text" id="date" class="form-control @error('expiry_date') is-invalid @enderror"
                        name="expiry_date" value="{{ $job->expiry_date }}">
                    @error('expiry_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName">City</label>
                    <select class="form-select mb-3 @error('city_id') is-invalid @enderror" name="city_id">
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
                <div class="mb-3">
                    <label for="inputName">Salary</label>
                    <input type="text" id="inputName" class="form-control @error('salary') is-invalid @enderror"
                        name="salary" value="{{ $job->salary }}">
                    @error('salary')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName">Job Description</label>
                    <textarea id="jobD" name="description" class="form-control @error('description') is-invalid @enderror ckeditor">
                               {{ $job->description }}
                              </textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName">Job Responsibilities</label>
                    <textarea id="responsibilities" name="responsibilities"
                        class="form-control @error('responsibilities') is-invalid @enderror ckeditor">
                            {{ $job->responsibilities }}
                              </textarea>
                    @error('responsibilities')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName">Education and experience</label>
                    <textarea id="education_experience" name="education_experience"
                        class="form-control @error('education_experience') is-invalid @enderror ckeditor">
                        {{ $job->education_experience }}
                              </textarea>
                    @error('education_experience')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName">Benefits</label>
                    <textarea id="benefits" name="benefits" class="form-control @error('benefits') is-invalid @enderror ckeditor">
                        {{ $job->benefits }}
                              </textarea>
                    @error('benefits')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputStatus">Status</label>
                    <select id="inputStatus" class="form-select mb-3 @error('status') is-invalid @enderror" name="status">
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
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('job.index') }}" class="btn btn-secondary" style="float:right">Back</a>
            </form>

        </div>
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
    </script>
@endsection

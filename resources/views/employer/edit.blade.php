@extends('employer.sidebar')
@section('title', 'My Profile')
@section('contents')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">My Profile</h6>
            <form method="POST" action="{{ route('employer.update', $employeer->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="inputName">First Name</label>
                    <input type="text" id="inputName" class="form-control @error('first_name') is-invalid @enderror"
                        name="first_name" value="{{ $employeer->first_name }}">
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName">Last Name</label>
                    <input type="text" id="inputName" class="form-control @error('last_name') is-invalid @enderror"
                        name="last_name" value="{{ $employeer->last_name }}">
                    @error('last_name')
                        <span class="  invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName">Email</label>
                    <input type="text" id="inputName" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ $employeer->email }}" readonly>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName">Company Name</label>
                    <input type="text" id="inputName" class="form-control @error('company_name') is-invalid @enderror"
                        name="company_name" value="{{ $employeer->company_name }}">
                    @error('company_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName">Location</label>
                    <input type="text" id="inputName" class="form-control @error('location') is-invalid @enderror"
                        name="location" value="{{ $employeer->location }}">
                    @error('location')
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
                            <option value="{{ $city->id }}" @if (old('city_id') == $city->id || $city->id == $employeer->city_id) selected @endif>
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
                    <label for="inputName">Phone Number</label>
                    <input type="text" id="inputName" class="form-control @error('contact') is-invalid @enderror"
                        name="contact" value="{{ $employeer->contact }}">
                    @error('contact')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName">Website</label>
                    <input type="text" id="inputName" class="form-control @error('website') is-invalid @enderror"
                        name="website" value="{{ $employeer->website }}">
                    @error('website')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName">PAN Number</label>
                    <input type="text" id="inputName" class="form-control @error('pan_number') is-invalid @enderror"
                        name="pan_number" value="{{ $employeer->pan_number }}">
                    @error('pan_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName">Company Description</label>
                    <textarea name="description" class="@error('pan_number') is-invalid @enderror ckeditor">
                                {{ $employeer->description }}
                            </textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('employer.dash') }}" class="btn btn-secondary" style="float:right">Back</a>
            </form>
        </div>
    </div>
@endsection

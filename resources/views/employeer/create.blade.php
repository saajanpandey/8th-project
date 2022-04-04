@extends('admin.sidebar')
@section('title', 'Create Employeer')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Employer</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dash') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add Employer</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Employer</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('employer.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="inputName">First Name</label>
                            <input type="text" id="inputName" class="form-control @error('first_name') is-invalid @enderror"
                                name="first_name">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">Last Name</label>
                            <input type="text" id="inputName" class="form-control @error('last_name') is-invalid @enderror"
                                name="last_name">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputName">Email</label>
                            <input type="text" id="inputName" class="form-control @error('email') is-invalid @enderror"
                                name="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">Company Name</label>
                            <input type="text" id="inputName"
                                class="form-control @error('company_name') is-invalid @enderror" name="company_name">
                            @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">Location</label>
                            <input type="text" id="inputName" class="form-control @error('location') is-invalid @enderror"
                                name="location">
                            @error('location')
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
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">Phone Number</label>
                            <input type="text" id="inputName" class="form-control @error('contact') is-invalid @enderror"
                                name="contact">
                            @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">Website</label>
                            <input type="text" id="inputName" class="form-control @error('website') is-invalid @enderror"
                                name="website">
                            @error('website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">PAN Number</label>
                            <input type="text" id="inputName" class="form-control @error('pan_number') is-invalid @enderror"
                                name="pan_number">
                            @error('pan_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">Company Description</label>
                            <textarea id="summernote" name="description" class="form-control @error('description') is-invalid @enderror">

                              </textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">Password</label>
                            <input type="password" id="inputName"
                                class="form-control @error('password') is-invalid @enderror" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">Confirm Password</label>
                            <input type="password" id="inputName"
                                class="form-control @error('confirm_password') is-invalid @enderror"
                                name="password_confirmation">
                            @error('confirm_password')
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
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
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
                    <a href="{{ route('employer.index') }}" class="btn btn-secondary">Cancel</a>
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
        $('#summernote').summernote({
            height: 400,
        })
    </script>
@endsection

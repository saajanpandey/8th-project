@extends('admin.sidebar')
@section('title', 'Change Password')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Change Password</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dash') }}">Home</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Change Password</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.password') }}">
                        @csrf
                        <div class="form-group">
                            <label for="inputName">Current Password</label>
                            <input type="password" id="inputName"
                                class="form-control @error('current_password') is-invalid @enderror"
                                name="current_password">
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">New Password</label>
                            <input type="password" id="inputName"
                                class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputName">Confirm Password</label>
                            <input type="password" id="inputName"
                                class="form-control @error('confirm_password') is-invalid @enderror"
                                name="confirm_password">
                            @error('confirm_password')
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
                    <a href="{{ route('admin.dash') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Change Password" class="btn btn-success float-right">
                </div>
            </div>
            <!-- /.card -->
            </form>
        </section>
    </div>
@endsection

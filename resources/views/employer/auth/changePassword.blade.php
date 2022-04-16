@extends('employer.sidebar')
@section('title', 'Change Password')
@section('contents')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Change Password</h6>
            <form method="POST" action="{{ route('employer.password') }}">
                @csrf
                <div class="mb-3">
                    <label for="inputName">Current Password</label>
                    <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                        name="current_password">
                    @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName">New Password</label>
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                        name="new_password">
                    @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputName">Confirm New Password</label>
                    <input type="password" class="form-control @error('new_confirm_password') is-invalid @enderror"
                        name="new_confirm_password">
                    @error('new_confirm_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Change</button>
                <a href="{{ route('job.index') }}" class="btn btn-secondary" style="float:right">Back</a>
            </form>

        </div>
    </div>
@endsection

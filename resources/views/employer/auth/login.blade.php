@extends('layouts.frontend')
@section('title', 'Employer Login')
@section('contents')
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('/frontend/images/img_2.jpg');"
        id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                </div>
                <div class="col">
                    <div class="border border-white p-3 bg-white">
                        <form action="{{ route('employer.login') }}" method="POST">
                            @csrf
                            @if (session()->has('unsuccess'))
                                <div class="alert alert-danger">
                                    <strong>
                                        {!! session()->get('unsuccess') !!}
                                    </strong>
                                </div>
                            @endif
                            @php
                                Request::session()->forget('unsuccess');
                            @endphp
                            <div class="form-floating mb-3">
                                Employer Login
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="floatingInput" placeholder="Email" name="email">
                                <label for="floatingInput">Email address</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="floatingPassword" placeholder="Password" name="password">
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="float-right form-floating mb-4">
                                <input type="checkbox" class="form-check-input" id="checkbox">
                                <label class="form-check-label">Show
                                    Password</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember_me"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        </form>
                        <p class="text-center mb-0">Don't have an Account? <a href="{{ route('employer.signup') }}">Sign
                                Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#checkbox').on('change', function() {
                $('#floatingPassword').attr('type', $('#checkbox').prop('checked') == true ? "text" :
                    "password");
            });
        });
    </script>
@endsection

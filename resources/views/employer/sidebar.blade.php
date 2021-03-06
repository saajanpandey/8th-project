@extends('layouts.employer')
@section('content')
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ route('employer.dash') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">EMPLOYER</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        @if (isset(Auth::user()->image))
                            <img class="rounded-circle" src="{{ asset('/uploads/logo/' . Auth::user()->image) }}" alt=""
                                style="width: 40px; height: 40px;">
                        @else
                            <img class="rounded-circle" src="{{ asset('dist/img/dummy2.jpeg') }}" alt=""
                                style="width: 40px; height: 40px;">
                        @endif
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->full_name }}</h6>
                        <span>Employer</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('employer.dash') }}" class="nav-link "><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{ route('job.index') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Jobs</a>
                    <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notification</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            @if (isset(Auth::user()->image))
                                <img class="rounded-circle me-lg-2"
                                    src="{{ asset('/uploads/logo/' . Auth::user()->image) }}" alt=""
                                    style="width: 40px; height: 40px;">
                            @else
                                <img class="rounded-circle me-lg-2" src="{{ asset('dist/img/dummy2.jpeg') }}" alt=""
                                    style="width: 40px; height: 40px;">
                            @endif
                            <span class="d-none d-lg-inline-flex">{{ Auth::user()->full_name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{ route('employer.edit', auth()->user()->id) }}" class="dropdown-item">My
                                Profile</a>
                            <a class="dropdown-item" data-action="{{ route('employer.logo', auth()->user()->id) }}"
                                data-bs-toggle="modal" href="#imageUpload">
                                Upload Logo
                            </a>
                            <a class="dropdown-item" data-action="{{ route('employer.pan', auth()->user()->id) }}"
                                data-bs-toggle="modal" data-bs-target="#panUploads">
                                Upload PAN
                            </a>
                            <a href="{{ route('employer.change-password.view') }}" class="dropdown-item">Change
                                Password</a>
                            <a href="{{ route('employer.logout') }}" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            @yield('contents')


            <!-- Footer Start -->
            {{-- <div class="container-fluid pt-4 px-4" style="position:static">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div> --}}
            <!-- Content End -->
        </div>
        <div class="modal fade" id="imageUpload" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="imageUpload" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload Company Logo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="modal-confirm_upload">Upload Logo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="panUploads" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="panUploads" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload PAN</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="pan_image">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="modal-confirm_upload">Upload PAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script>
            var imageModal = document.getElementById('imageUpload');
            imageModal.addEventListener('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var action = button.data('action');
                var modal = $(this);
                modal.find('form').attr('action', action);
            });
            var panModal = document.getElementById('panUploads');
            panModal.addEventListener('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var action = button.data('action');
                var modal = $(this);
                modal.find('form').attr('action', action);
            })
        </script>
    @endsection

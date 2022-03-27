@extends('admin.sidebar')
@section('title', 'View Employeer')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">View Employer</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dash') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('employeer.index') }}">Employer</a></li>
                            <li class="breadcrumb-item active">View Employer</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">View Employer</h3>
                    <a href="{{ route('employeer.index') }}" class="btn btn-secondary btn-sm" style="float: right;">Go
                        Back</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <tbody>
                            <tr>
                                <td>Employeer Name</td>
                                <td>{{ $employeer->first_name . ' ' . $employeer->last_name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Employeer Email</td>
                                <td>{{ $employeer->email ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Employeer Contact</td>
                                <td>{{ $employeer->contact ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Company Name</td>
                                <td>{{ $employeer->company_name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Company Location</td>
                                <td>{{ $employeer->location ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Comapny City</td>
                                <td>{{ $employeer->city->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Company Website</td>
                                <td>{{ $employeer->website ?? '-' }}</td>
                            </tr>

                            <tr>
                                <td>Company PAN Number</td>
                                <td>{{ $employeer->pan_number ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Comapny Logo</td>
                                <td><img src="{{ '/uploads/logo/' . $employeer->image }}" alt="company logo" width="200px"
                                        height="200px"></td>
                            </tr>
                            <tr>
                                <td>PAN Number Image</td>
                                <td><img src="{{ '/uploads/pan/' . $employeer->pan_image ?? '-'}}" alt="employer pan image" width="200px"
                                        height="200px"></td>
                            </tr>
                            <tr>
                                <td>Company Description</td>
                                <td style="text-wrap">{!! $employeer->description ?? '-' !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection

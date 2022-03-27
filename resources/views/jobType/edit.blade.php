@extends('admin.sidebar')
@section('title', 'Add Job Types')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Job Type</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dash') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Job Type</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Job Type</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('jobtype.update', $type->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" id="inputName" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $type->name }}">
                            @error('name')
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
                                <option value="1" @if ($type->status == 1) selected @endif>Enable</option>
                                <option value="0" @if ($type->status == 0) selected @endif>Disable</option>
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
                    <a href="{{ route('jobtype.index') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Update" class="btn btn-success float-right">
                </div>
            </div>
            <!-- /.card -->
            </form>
        </section>
    </div>
@endsection

@extends('admin.sidebar')
@section('title', 'Employers')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Employers</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dash') }}">Home</a></li>
                            <li class="breadcrumb-item active">Employers</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Employers</h3>
                    <div class="card-tools">
                        <a class="btn btn-primary btn-block btn-sm" href="{{ route('employer.create') }}">
                            <i class="fas fa-plus"></i>
                            Add New
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 7%">
                                    S.N
                                </th>
                                <th style="width: 12%">
                                    Company Name
                                </th>
                                <th style="width: 12%" class="text-center">
                                    Location
                                </th>
                                <th style="width: 9%" class="text-center">
                                    Status
                                </th>
                                <th style="width: 35%" class="text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($employeers as $employeer)
                                {{-- @dd($employeer) --}}
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                    </td>
                                    <td>
                                        {{ $employeer->company_name }}
                                    </td>
                                    <td class="project-state">
                                        {{ $employeer->location }}
                                    </td>
                                    <td class="project-state">
                                        @if ($employeer->status == 1)
                                            <span class="badge badge-success">Enable</span>
                                        @elseif ($employeer->status == 0)
                                            <span class="badge badge-danger">Disable</span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('employer.show', $employeer->id) }}">
                                            <i class="fas fa-eye"></i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('employer.edit', $employeer->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm"
                                            data-action="{{ route('employer.destroy', $employeer->id) }}"
                                            data-toggle="modal" data-target="#deleteEmployeer">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>

                                        <button type="button" class="btn btn-secondary btn-sm"
                                            data-action="{{ route('employer.logo', $employeer->id) }}" data-toggle="modal"
                                            data-target="#imageUpload">
                                            <i class="fas fa-upload"></i>
                                            Upload Logo
                                        </button>

                                        <button type="button" class="btn btn-secondary btn-sm"
                                            data-action="{{ route('employer.pan', $employeer->id) }}" data-toggle="modal"
                                            data-target="#panUploads">
                                            <i class="fas fa-upload"></i>
                                            Upload PAN
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
        <div class="d-flex justify-content-center">
            {!! $employeers->links() !!}
        </div>
        <div class="modal fade" id="deleteEmployeer" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="deleteCategory" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">This action is not reversible.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete <span id="modal-category_name"></span>?
                        <input type="hidden" id="category" name="category_id">
                    </div>
                    <div class="modal-footer">
                        <form action="" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="button" class="btn bg-white" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger" id="modal-confirm_delete"
                                onclick="">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="imageUpload" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="imageUpload" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload Company Logo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="modal-confirm_upload">Upload Logo</button>
                        </form>
                    </div>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="pan_image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal-confirm_upload">Upload PAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
@section('scripts')
    <script>
        $('#deleteEmployeer').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var modal = $(this);
            modal.find('form').attr('action', action);
        });

        $('#imageUpload').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var modal = $(this);
            modal.find('form').attr('action', action);
        });

        $('#panUploads').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var modal = $(this);
            modal.find('form').attr('action', action);
        })
    </script>
@endsection

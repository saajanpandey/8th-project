@extends('admin.sidebar')
@section('title', 'Job Types')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Job Types</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dash') }}">Home</a></li>
                            <li class="breadcrumb-item active">Job Types</li>
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
                    <h3 class="card-title">Job Types</h3>
                    <div class="card-tools">
                        {{-- <a class="btn btn-primary btn-block btn-sm" href="{{ route('jobtype.create') }}">
                            <i class="fas fa-plus"></i>
                            Add New
                        </a> --}}
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 20%">
                                    S.N
                                </th>
                                <th style="width: 10%">
                                    Name
                                </th>
                                {{-- <th style="width: 30%" class="text-center">
                                    Status
                                </th>
                                <th style="width: 15%">
                                    Action
                                </th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($types as $type)
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                    </td>
                                    <td>
                                        <a>
                                            {{ $type->name }}
                                        </a>
                                    </td>
                                    {{-- <td class="project-state">
                                        @if ($type->status == 1)
                                            <span class="badge badge-success">Enable</span>
                                        @elseif ($type->status == 0)
                                            <span class="badge badge-danger">Disable</span>
                                        @endif
                                    </td> --}}
                                    {{-- <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('jobtype.edit', $type->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm"
                                            data-action="{{ route('jobtype.destroy', $type->id) }}" data-toggle="modal"
                                            data-target="#deleteCategory">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </td> --}}
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
            {!! $types->links() !!}
        </div>

        <div class="modal fade" id="deleteCategory" data-backdrop="static" tabindex="-1" role="dialog"
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
    </div>
@endsection
@section('scripts')
    <script>
        $('#deleteCategory').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var modal = $(this);
            modal.find('form').attr('action', action);
        })
    </script>
@endsection

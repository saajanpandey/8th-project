@extends('admin.sidebar')
@section('title', 'Add Job Types')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Jobs</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dash') }}">Home</a></li>
                            <li class="breadcrumb-item active">Jobs</li>
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
                    <h3 class="card-title">Jobs</h3>
                    <div class="card-tools">
                        <a class="btn btn-primary btn-block btn-sm" href="{{ route('job.create') }}">
                            <i class="fas fa-plus"></i>
                            Add New
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>
                                    S.N
                                </th>
                                <th>
                                    Job Title
                                </th>
                                <th>
                                    Job Company
                                </th>
                                <th>
                                    Expiry Date
                                </th>
                                <th>
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                    </td>
                                    <td>
                                        {{ $job->title ?? '-' }}
                                    </td>
                                    <td>
                                        {{ $job->company->company_name ?? '-' }}
                                    </td>
                                    <td>
                                        {{ $job->expiry_date ?? '-' }}
                                    </td>
                                    <td>
                                        @if ($job->status == 1)
                                            <span class="badge badge-success">Enable</span>
                                        @elseif ($job->status == 0)
                                            <span class="badge badge-danger">Disable</span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('job.edit', $job->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm"
                                            data-action="{{ route('job.destroy', $job->id) }}" data-toggle="modal"
                                            data-target="#deleteJob">
                                            <i class="fas fa-trash"></i>
                                            Delete
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
            {!! $jobs->links() !!}
        </div>

        <div class="modal fade" id="deleteJob" data-backdrop="static" tabindex="-1" role="dialog"
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
        $('#deleteJob').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var modal = $(this);
            modal.find('form').attr('action', action);
        })
    </script>
@endsection

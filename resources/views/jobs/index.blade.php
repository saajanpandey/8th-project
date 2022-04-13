@extends('employer.sidebar')
@section('title', 'Jobs')
@section('contents')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <a class="btn btn-info btn-sm" href="{{ route('job.create') }}" style="float: right">
                <i class="fas fa-plus"></i>
                Add Job
            </a>
            <h6 class="mb-4">Jobs</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Job Type</th>
                            <th scope="col">Expiry Date</th>
                            <th scope="col">Status</th>
                            <th scope="col" style="colspan:2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($jobs as $job)
                            <tr>
                                <th scope="row"> {{ $i++ }}</th>
                                <td> {{ $job->title ?? '-' }}</td>
                                <td>{{ $job->type->name ?? '-' }}</td>
                                <td> {{ $job->expiry_date ?? '-' }}</td>
                                <td>
                                    @if ($job->status == 1)
                                        <span class="badge bg-success">Enable</span>
                                    @elseif ($job->status == 0)
                                        <span class="badge bg-danger">Disable</span>
                                    @endif
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('job.edit', $job->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-action="{{ route('job.destroy', $job->id) }}" data-bs-toggle="modal"
                                        data-bs-target="#deleteJob">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $jobs->links() !!}
                </div>
                <div class="modal fade" id="deleteJob" data-backdrop="static" tabindex="-1" role="dialog"
                    aria-labelledby="deleteCategory" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">This action is not reversible.</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete ?
                            </div>
                            <div class="modal-footer">
                                <form action="" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" id="modal-confirm_delete"
                                        onclick="">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var deleteModal = document.getElementById('deleteJob');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var modal = $(this);
            modal.find('form').attr('action', action);
        })
    </script>
@endsection

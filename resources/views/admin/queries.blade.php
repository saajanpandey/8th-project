@extends('admin.sidebar')
@section('title')
    Feedbacks and Queries
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Feedbacks and Queries</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dash') }}">Home</a></li>
                            <li class="breadcrumb-item active">Feedbacks and Queries</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Feedbacks and Queries</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($contacts as $contact)
                                {{-- @dd($employeer) --}}
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                    </td>
                                    <td>{{ $contact->full_name ?? '-' }}</td>
                                    <td><a href="mailto:{{ $contact->email ?? '-' }}">{{ $contact->email ?? '-' }}</a>
                                    </td>
                                    <td>{{ $contact->subject ?? '-' }}</td>
                                    <td style="word-wrap:anywhere">{{ $contact->message ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('contact.destroy', $contact->id) }}" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </section>
        <div class="d-flex justify-content-center">
            {!! $contacts->links() !!}
        </div>
    </div>
@endsection

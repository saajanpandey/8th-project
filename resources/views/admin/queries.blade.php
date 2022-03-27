@extends('admin.sidebar')
@section('title')
Customer Queries
@endsection
@section('main-content')

 <div class="container-fluid">



    <div class="card shadow mb-4">
        <div class="card-header d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto">Customer Queries</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($contacts as $contact)
                        <tr>
                            <td>{{$contact->name??'-'}}</td>
                            <td>{{$contact->email??'-'}}</td>
                            <td>{{$contact->subject??'-'}}</td>
                            <td>{{$contact->message??'-'}}</td>
                            <td>
                                <a href="{{route('contact.destroy',$contact->id)}}" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                        @endforeach


                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $contacts->links() !!}
                </div>
            </div>
        </div>
    </div>

</div>


</div>
@endsection

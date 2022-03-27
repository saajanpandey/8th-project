@extends('admin.sidebar')
@section('title')
Edit Profile
@endsection
@section('main-content')

<div class="mx-auto" style="width: 700px;">
    <div class="card shadow">
        <div class="card-header">
        Edit Profile
        <a href="{{route('admin.dash')}}"><button class="close" type="button">
            <span aria-hidden="true">×</span>
        </button></a>        </div>
        <div class="card-body ">
            <form action="{{route('admin.update',Auth::user()->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group row">
                   <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" name="name" value="{{$admin->name}}">
                   </div>
                 </div>
                 <div class="form-group row">
                   <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" name="email"  readonly value="{{$admin->email}}">
                   </div>
                 </div>
                 <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
      </div>
  </div>


</div>
@endsection

@extends('login.layout')
@section('content')


@if($errors->any())

    @foreach($errors->all() as $error)  
    <div>
    {{$error}}
    </div>
    @endforeach

@endif
  <h1>Edit Dep  </h1>
  <div class="container mt-5">
  <div class="card shadow-lg p-4 rounded-3">
    <div class="card-body">
      <h4 class="card-title mb-3">Edit Department</h4>

<form action="{{route('dep_update',['dep_id'=>$dep_id])}}" method="POST" class="ms-auto me-auto mt-auto" style="width:500px">
            @csrf
             @method('PUT')
            <div class="mb-3">
                <label class="form-label">Dep Name</label>
                <input type="text" class="form-control" value="{{$dep_id->dep_name}}" name="dep_name">

              
               

        <button type="submit" class="btn btn-primary">Update</button>
        </form>

@endsection
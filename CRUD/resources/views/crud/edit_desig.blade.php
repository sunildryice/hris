@extends('login.layout')
@section('content')


@if($errors->any())

    @foreach($errors->all() as $error)  
    <div>
    {{$error}}
    </div>
    @endforeach

@endif
  <h1>Edit Desig </h1>
  <div class="container mt-5">
  <div class="card shadow-lg p-4 rounded-3">
    <div class="card-body">
      <h4 class="card-title mb-3">Edit Designation</h4>

<form action="{{route('desig_update',['desig_id'=>$desig_id])}}" method="POST" class="ms-auto me-auto mt-auto" style="width:500px">
            @csrf
             @method('PUT')
            <div class="mb-3">
                <label class="form-label">Desig Name</label>
                <input type="text" class="form-control" value="{{$desig_id->desig_name}}" name="desig_name">

              
               

        <button type="submit" class="btn btn-primary">Update</button>
        </form>

@endsection
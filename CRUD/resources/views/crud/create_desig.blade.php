@extends('login.layout')
@section('content')


@if($errors->any())

    @foreach($errors->all() as $error)  
    <div>
    {{$error}}
    </div>
    @endforeach

@endif
  <h1>Create Dep & Desig </h1>
  <div class="container mt-5">
  <div class="card shadow-lg p-4 rounded-3">
    <div class="card-body">
      <h4 class="card-title mb-3">Create  Designation</h4>

<form action="{{route('designation.store')}}" method="post" class="ms-auto me-auto mt-auto" style="width:500px">
            @csrf
          

                <div class="mb-3">
                    <label class="form-label">Desig Name</label>
                    <input type="text" class="form-control" name="desig_name">
                </div>
               

                    <button type="submit" class="btn btn-primary">Submit</button>
        </form>

@endsection
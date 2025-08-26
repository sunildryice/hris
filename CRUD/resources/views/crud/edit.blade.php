@extends('login.layout')
@section('title','Login')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>

<body>
    <h1>Edit</h1>

    <div class="container mt-5">
        <div class="card shadow-lg p-4 rounded-3">
            <div class="card-body">
                <h4 class="card-title mb-3">Edit Employee</h4>
                @if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger">
  {{$error}}
</div>
@endforeach
@endif


                <form method="POST" action="{{route('employee.update',['staff_id'=>$staff_id])}}">
                    @csrf
                    @method('PUT')

                    <div>
                        <div class="row g-2">
                            <div class="col-4">


                                <label class="form-label">Full_name</label>
                                <input type="text" class="form-control " name="full_name"
                                    value="{{$staff_id->full_name}}">
                            </div>
                            <div class="col-4">


                                <label class="form-label">Contact_Number</label>
                                <input type="text" class="form-control " name="contact_number"
                                    placeholder="Contact Number" value="{{$staff_id->contact_number}}">
                            </div>
                            <div class="col-4">

                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email"value="{{$staff_id->email}}">
                            </div>
                            <div class="col-4">

                                <label class="form-label">Permanent_address</label>
                                <input type="text" class="form-control " name="permanent_address"
                                    placeholder="Permanent Address " value="{{$staff_id->permanent_address}}">
                            </div>
                            <div class="col-4">


                                <label class="form-label">Temporary_address</label>
                                <input type="text" class="form-control " name="temporary_address"
                                    placeholder="Temporary Address" value="{{$staff_id->temporary_address}}">
                            </div>

                        </div>
                        <div class="row g-2">
                            <div class="col-4">
                                <button class="btn btn-primary" type="submit">Update</button>

                            </div>
                        </div>
                </form>
</body>

</html>
@endsection
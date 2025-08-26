@extends('login.layout')
@section('title','Login')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>create</title>
</head>

<body>
  <h1>Create</h1>
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
    @endif
    <div class="container mt-5">
      <div class="card shadow-lg p-4 rounded-3">
        <div class="card-body">
          <h4 class="card-title mb-3">Create Employee</h4>


          <form method="POST" action="{{route('employee.store')}}">
            @csrf

            <div>
              <div class="row g-2">
                <div class="col-4">
                  <label>Select Departments</label>
                  <select name="dep_id" class="form-select" required>
                    <option>--Select Departments--</option>
                    @foreach($data as $dats)
                    <option value="{{$dats->dep_id}}">{{$dats->dep_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <label>Select Designation</label>
                  <select name="desig_id" class="form-select" required>
                    <option>--Select Designation--</option>
                    @foreach($dataa as $dats)
                    <option value="{{$dats->desig_id}}">{{$dats->desig_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <label for="full_name" class="form-label">Full_name</label>
                  <input type="text" class="form-control " id="full_name" name="full_name" placeholder="Full Name">
                </div>
                <div class="col-4">
                  <label class="form-label">Contact_Number </label>
                  <input type="text" class="form-control" name="contact_number" placeholder="Contact Number">
                </div>
                <div class="col-4">
                  <label class="form-label">Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="col-4">
                  <label class="form-label">Permanent_address</label>
                  <input type="text" class="form-control" name="permanent_address" placeholder="Permanent Address ">
                </div>
                <div class="col-4">
                  <label class="form-label">Temporary_address</label>
                  <input type="text" class="form-control" name="temporary_address" placeholder="Temporary Address">
                </div>
              </div>
              <div class="row g-9">
                <div class="col-">
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>
              </div>

          </form>
</body>

</html>
@endsection
@extends('login.layout')
@section('title','Login')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details</title>
</head>

<body>
     <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <a class="navbar-brand" href="{{ route('employee.details', ['staff_id' => $emp_id]) }}">Details</a>
        <a class="navbar-brand" href="{{route('attendence.show',['emp_id'=>$emp_id])}}">Attendence</a>
    </nav>

    <div class="mt-5">
        @if ($errors->any())
        <div class="col-12">
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        </div>
        @endif

    <form id="myForm" method="post" action="{{route('attendence.store',['emp_id'=>$emp_id])}}">
        @csrf
         <div class="col-4">
            <label for="full_name" class="form-label">Date </label>
            <input type="text" class="form-control " id="full_name" name="date" value="{{now()->toDateString() }}">
        </div>
        <div class="col-4">
            <label for="full_name" class="form-label">Check In</label>
            <input type="text" class="form-control " id="check_in" name="check_in" placeholder=" Check_In Time">
        </div>
        <div class="col-4">
            <label class="form-label"> </label>Check Out</label>
            <input type="text" class="form-control" name="check_out" placeholder="Check_Out Time ">
        </div>
            <div class="col-4">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
    </form>
</body>
</html>
@endsection



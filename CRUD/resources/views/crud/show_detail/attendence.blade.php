@extends('login.layout')
@section('title','Dep')
@section('content')

<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <a class="navbar-brand" href="{{ route('employee.details', ['staff_id' => $emp_id]) }}">Details</a>
    <a class="navbar-brand " href="{{route('attendence.show',['emp_id'=>$emp_id])}}">Attendence</a>
</nav>

<div style="color:red ; font-size:20px;">
    @if(session()->has('success'))
    {{session('success')}}
    @endif
</div>

<div class="mt-5">
    @if ($errors->any())
    <div class="col-12">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    </div>
    @endif

    <div class="container ">
        <div class="row g-2">
            <div class="col-6 table-responsive">
                <h1> Employee Name:: {{$name}}</h1>
                <table class=" table table-bordered table-striped  w-auto" border="2">
                    <tr class="table-active">
                        <th>Date</th>
                        <th>CheckIN</th>
                        <th>CheckOut</th>

                    </tr>
                    @foreach($data as $dataa)
                    <tr>
                        <td>{{$dataa->date}}</td>
                        <td>{{$dataa->check_in}}</td>
                        <td>{{$dataa->check_out}}</td>
                        {{-- <th>
                            <a class="btn btn-primary" href="{{route('dep.edit',['dep_id'=>$dataa->dep_id])}}">Edit</a>
                        </th>
                        <th>
                            <form action="{{route('dep.delete',['dep_id'=>$dataa->dep_id])}}" method="post"
                                onsubmit="return confirm('Are you sure to Delete??');">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger">Delete</button>
                            </form>

                        </th> --}}
                    </tr>
                    @endforeach
                </table>
                <a class="btn btn-primary" href="{{route('attendence.create',['emp_id'=>$emp_id])}}">Add Attendence</a>
            </div>
        </div>
    </div>
    @endsection
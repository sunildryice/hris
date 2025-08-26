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
    <h1>Details</h1>
    <div class="container mt-5">
        <div class="card shadow-lg p-4 rounded-3">
            <div class="card-body">
                <h4 class="card-title mb-3">Details</h4>
                {{--
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item">Full_name</li>
                    <li class="list-group-item">{{$staff_id->full_name}}</li>
                </ul>

                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item">Contact_Number</li>
                    <li class="list-group-item">{{$staff_id->contact_number}}</li>
                </ul>

                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item">Email</li>
                    <li class="list-group-item">{{$staff_id->email}}</li>
                </ul>

                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item">Permanent_address</li>
                    <li class="list-group-item">{{$staff_id->permanent_address}}</li>
                </ul>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item">Temporary_address</li>
                    <li class="list-group-item">{{$staff_id->temporary_address}}</li>
                </ul> --}}


                <table class=" table table-bordered table-striped table-responsive w-auto " border="2">
                    <tr>
                        <td>Full_name</td>
                        <td>{{$staff_id->full_name}}</td>
                    </tr>
                    <tr>
                        <td>Contact_Number</td>
                        <td>{{$staff_id->contact_number}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$staff_id->email}}</td>
                    </tr>
                    <tr>
                        <td>Permanent_address</td>
                        <td>{{$staff_id->permanent_address}}</td>
                    </tr>
                    <tr>
                        <td>Temporary_address</td>
                        <td>{{$staff_id->temporary_address}}</td>
                    </tr>
                </table>


                <h3>Additional Details</h3>
                @foreach($employee->details as $detail)
                <p>Emergency Contact: {{ $detail->emerg_contact }}</p>
                <p>Contact Name: {{ $detail->emerg_name }}</p>
                <p>Relation: {{ $detail->relation }}</p>
                <p>Blood Group:{{$detail->blood_group}}</p>
                                <p>Blood Group:{{$detail->emp_id}}</p>

                {{-- <a class="btn btn-primary" href="">Edit</a>
                <form action="{{route('detail.delete',['det_id'=>$detail->det_id])}}" method="post"
                    onsubmit="return confirm('Are you sure to Delete??');">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger">Delete</button>
                </form> --}}
                <hr>
                @endforeach

                <div class="row g-2">
                    <div class="col-4">
                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#formsection" role="button"
                            aria-expanded="false" aria-controls="formsection">
                            Add More
                        </a>



                        {{-- <a href="#" class="btn btn-primary">Edit</a> --}}





                        <div id="formsection" class="collapse">
                            <div class="card card-body">
                                @if($errors->any())
                                @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{$error}}
                                </div>
                                @endforeach
                                @endif
                                <form id="myForm" method="post"
                                    action="{{route('detail.store',['emp_id'=>$staff_id])}}">
                                    @csrf
                                    <div class="col-4">
                                        <label for="full_name" class="form-label">Emergency Contact</label>
                                        <input type="text" class="form-control " id="full_name" name="emerg_contact"
                                            placeholder=" contact">
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label">Contact Name </label>
                                        <input type="text" class="form-control" name="emerg_name"
                                            placeholder="Contact Number">
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label">Relation</label>
                                        <input type="text" class="form-control" name="relation" placeholder="relation">
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label">Blood Group</label>
                                        <input type="text" class="form-control" name="blood_group"
                                            placeholder="Blood Group ">
                                    </div>


                                    <div class="row g-4">
                                        <div class="col-4">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <script>
                            document.getElementById('formsection').addEventListener('shown.bs.collapse', function () {
    document.getElementById('myForm').scrollIntoView({ 
        behavior: 'smooth', 
        block: 'start' 
    });
});
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
@endsection
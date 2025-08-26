@extends('login.layout')
@section('title','Desig')
@section('content')

  <div style="color:red ; font-size:20px;">
            @if(session()->has('success'))
            {{session('success')}}
            @endif

        </div>
<div class="container">
    <div class="col-6  table-responsive">
        <table class=" table table-bordered table-striped w-auto " border="2">
            <tr class="table-active">
                <th>Desig Id</th>
                <th>Designation Name</th>
                <th>Edit</th>
                    <th>Delete</th>

            </tr>

            @foreach($data as $dataa)
            <tr>
                <td>{{$dataa->desig_id}}</td>
                <td>{{$dataa->desig_name}}</td>
                 <th>
                        <a class="btn btn-primary" href="{{route('desig.edit',['desig_id'=>$dataa->desig_id])}}">Edit</a>
                    </th>
                    <th>
                        <form action="{{route('desig.delete',['desig_id'=>$dataa->desig_id])}}" method="post"
                            onsubmit="return confirm('Are you sure to Delete??');">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger">Delete</button>
                        </form>

                    </th>
            </tr>
            @endforeach
        </table>
        <a class="btn btn-primary" href="{{route('designation.create')}}">Add Designation</a>

    </div>
</div>


@endsection
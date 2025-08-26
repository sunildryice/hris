@extends('login.layout')
@section('title','Dep')
@section('content')

<div style="color:red ; font-size:20px;">
    @if(session()->has('success'))
    {{session('success')}}
    @endif

</div>
<div class="container ">
    <div class="row g-2">
        <div class="col-6 table-responsive">
            <table class=" table table-bordered table-striped  w-auto" border="2">
                <tr class="table-active">
                    <th>Dep Id</th>
                    <th>Department Name</th>
                    <th>Edit</th>
                    <th>Delete</th>


                </tr>
                @foreach($data as $dataa)
                <tr>
                    <td>{{$dataa->dep_id}}</td>
                    <td>{{$dataa->dep_name}}</td>
                    <th>
                        <a class="btn btn-primary" href="{{route('dep.edit',['dep_id'=>$dataa->dep_id])}}">Edit</a>
                    </th>
                    <th>
                        <form action="{{route('dep.delete',['dep_id'=>$dataa->dep_id])}}" method="post"
                            onsubmit="return confirm('Are you sure to Delete??');">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger">Delete</button>
                        </form>

                    </th>
                </tr>
                @endforeach
            </table>
            <a class="btn btn-primary" href="{{route('department.create')}}">Add Department</a>
        </div>
    </div>
</div>
</div>
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index Page</title>
</head>

<body>
    @extends('login.layout')
    @section('title','Login')
    @section('content')

    <div class="container">

        <h1>Employees</h1>
        <div class="text-end mb-3">
            <a class="btn btn-primary" href="{{ route('employee.create') }}">Add Employee</a>
            <a class="btn btn-primary" href="{{ route('upload.create') }}">Import</a>
        </div>

        <div style="color:red; font-size:20px;">
            @if(session()->has('success'))
                {{ session('success') }}
            @endif
        </div>

        <table class="table table-bordered table-striped table-responsive w-auto" border="2">
            <tr class="table-active">
                <th>FullName</th>
                <th>Email</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Details</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            @foreach($data as $dataa)
            <tr>
                <td>{{ $dataa->full_name }}</td>
                <td>{{ $dataa->email }}</td>
                <td>{{ $dataa->department->dep_name }}</td>
                <td>{{ $dataa->designation->desig_name }}</td>
                <td>
                    <a class="btn btn-primary"
                       href="{{ route('employee.details', ['staff_id' => $dataa->staff_id]) }}">Show</a>
                </td>
                <td>
                    <a class="btn btn-primary"
                       href="{{ route('employee.edit', ['staff_id' => $dataa->staff_id]) }}">Edit</a>
                </td>
                <td>
                    <form action="{{ route('employee.delete', ['staff_id' => $dataa->staff_id]) }}" method="post"
                          onsubmit="return confirm('Are you sure to Delete??');">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        <div class="mt-3">
            {{ $data->links('pagination::bootstrap-5') }}
        </div>

    </div>
    @endsection
</body>

</html>

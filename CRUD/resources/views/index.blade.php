<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>

    <h1>Index Page</h1>
    <div>
        <a href="{{route('employee.create')}}">Create Data</a>
        <br>
        <br>
        <div style="color:red">
            @if(session()->has('success'))
            {{session('success')}}
            @endif

        </div>

        <div>
            <table border="1">
                <tr>
                    <th>staffid</th>
                    <th>fullname</th>
                    <th>contact</th>
                    <th>email</th>
                    <th>permanent</th>
                    <th>temporary</th>
                    <th>Edit</th>
                    <th>Delete</th>


                </tr>

                @foreach($data as $dataa)
                <tr>
                    <td>{{$dataa->staff_id}}</td>
                    <td>{{$dataa->full_name}}</td>

                    <td>{{$dataa->contact_number}}</td>
                    <td>{{$dataa->email}}</td>

                    <td>{{$dataa->permanent_address}}</td>
                    <td>{{$dataa->temporary_address}}</td>
                    <th>
                        <a href="{{route('employee.edit',['staff_id'=>$dataa->staff_id])}}">Edit</a>
                    </th>
                    <th>
                        <form action="{{route('employee.delete',['staff_id'=>$dataa->staff_id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button>Delete</button>
                        </form>

                    </th>
                </tr>

                @endforeach


</body>

</html>
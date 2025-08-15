<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>

<body>
    <h1>Edit</h1>

    <form method="POST" action="{{route('employee.update',['staff_id'=>$staff_id])}}">
        @csrf
        @method('PUT')

        <div>


            <label>Full_name</label>
            <input type="text" name="full_name" value="{{$staff_id->full_name}}">
            <br>

            <label>Contact_Number</label>
            <input type="text" name="contact_number" placeholder="Contact Number" value="{{$staff_id->contact_number}}">
            <br>

            <label>Email</label>
            <input type="text" name="email" placeholder="Email" value="{{$staff_id->email}}">
            <br>

            <label>Permanent_address</label>
            <input type="text" name="permanent_address" placeholder="Permanent Address " value="{{$staff_id->permanent_address}}">
            <br>

            <label>Temporary_address</label>
            <input type="text" name="temporary_address" placeholder="Temporary Address" value="{{$staff_id->temporary_address}}">
            <br>
            <br>


            <button type="submit">Update</button>


    </form>
</body>

</html>
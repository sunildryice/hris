<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
</head>
<body>
    <h1>Create</h1>

    <form method="POST" action="{{route('employee.store')}}">
        @csrf

<div>
   

        <label>Full_name</label>
        <input type="text" name="full_name" placeholder="Full Name">
        <br>

        <label>Contact_Number</label>
        <input type="text" name="contact_number" placeholder="Contact Number">
        <br>
        
        <label>Email</label>
        <input type="text" name="email" placeholder="Email">
        <br>
        
        <label>Permanent_address</label>
        <input type="text" name="permanent_address" placeholder="Permanent Address ">
        <br>
        
        <label>Temporary_address</label>
        <input type="text" name="temporary_address" placeholder="Temporary Address">
        <br>
        <br>

        
        <button type="submit">Submit</button>
        

</form>
</body>
</html>
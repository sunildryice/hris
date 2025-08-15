<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="{{ route('login_match')}}" method="POST">
    @csrf 
   <label> Email</label>
   <input type="email"name="email">
   <span >
   <br>
      <label> Password</label>
      <input type="text" name="password">
      <br>
      <button type="submit">Login</button>
      <br>
      <br>
        <a href="{{route('dashboard')}}"> Dashboard</a>


</body>
</html>
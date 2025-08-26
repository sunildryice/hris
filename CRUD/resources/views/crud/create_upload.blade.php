@extends('login.layout')
@section('content')

  <h1>Upload</h1>
  <div class="container mt-5">
  <div class="card shadow-lg p-4 rounded-3">
    <div class="card-body">
      <h4 class="card-title mb-3">Upload Excel File</h4>

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger">
{{session('error')}}
</div>
@endif

<form action="{{route('upload.store')}}" method="post" class="ms-auto me-auto mt-auto" style="width:500px"
  enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label class="form-label">File</label>
    <input type="file" class="form-control" name="file">
    <br>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>

@endsection


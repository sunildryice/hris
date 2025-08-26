<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">My App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
      aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @auth
        <a class="nav-link" href="{{route('employee.home')}}">Home </a>
        <a class="nav-link" href="{{route('employee.index')}}">Employees</a>
        <a class="nav-link" href="{{route('employee.dep')}}">Departments</a>
          <a class="nav-link" href="{{route('employee.desig')}}">Designations</a>

        {{-- <a class="nav-link" href="{{route('department.create')}}">Create_Dep & Desig</a> --}}
        {{-- <a class="nav-link" href="{{route('upload.create')}}">Upload</a> --}}
            <div class="text-end">

        <a class="btn btn-danger text-end" class="nav-link" href="{{route('logout')}}">Logout</a>
                </div>


        @else
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('registration')}}">Registration</a>
        </li>
        @endauth

      </ul>
      <span class="navbar-text">@auth{{auth()->user()->name;}}@endauth
      </span>
    </div>
  </div>
</nav>
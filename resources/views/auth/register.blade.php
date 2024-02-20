@extends('layouts.main')

@section('content')

<div class="d-flex align-items-center py-4">

  <main class="form-signin w-100 m-auto">
    <form method="POST" action="/register">
      @csrf
      <h1 class="h3 mb-3 fw-normal">Register</h1>

      <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email</label>
      </div>
      <div class="form-floating">
        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Username">
        <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <div class="form-check text-start my-3">
        <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Remember me
        </label>
      </div>
      <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
    </form>
  </main>

</div>

@endsection
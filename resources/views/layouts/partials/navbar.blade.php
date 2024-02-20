@auth

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
            Welcome, {{ auth()->user()->name ?? "ah" }}
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="#" class="dropdown-item">Dashboard</a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="post" action="/logout">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

@else

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav">
        <li><a class="nav-link" aria-current="page" href="/">Home</a></li>
        <li><a class="nav-link" href="/student/all">Student</a></li>
        <li><a class="nav-link" href="/kelas/all">Kelas</a></li>
        <li><a class="nav-link" href="/extracurricular">Extracurricular</a></li>
        <li><a class="nav-link" href="/about">About</a></li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <a class="nav-link" href="/login">Login</a>
        <a class="nav-link" href="/register">Register</a>
      </ul>
    </div>
  </div>
</nav>

@endauth
<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary vh-100">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/dashboard">
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/student/all">
              Student
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/kelas/all">
              Kelas
            </a>
          </li>
        </ul>

        <hr class="my-3">

        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
              Settings
            </a>
          </li>
          <li class="nav-item">
            <form method="post" action="/logout">
              @csrf
              <button type="submit" class="nav-link d-flex align-items-center gap-2">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
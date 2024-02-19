<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark sidebar">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-4">Sekolah Kita</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      @guest
        <li class="nav-item home-sidebar">
          <a href="/" class="nav-link text-white" aria-current="page">Home</a>
        </li>
        <li class="nav-item school-sidebar">
          <a href="/school" class="nav-link text-white">School</a>
        </li>
      @endguest
      @auth
        @if (auth()->user()->role == 'admin')
          <li class="nav-item home-sidebar">
            <a href="/" class="nav-link text-white" aria-current="page">
              Home
            </a>
          </li>
          <li class="nav-item school-sidebar">
            <a href="/school" class="nav-link text-white">School</a>
          </li>
          <li class="nav-item headmaster-sidebar">
            <a href="/headmaster" class="nav-link text-white">Headmaster</a>
          </li>
          <li class="nav-item teacher-sidebar">
            <a href="/teacher" class="nav-link text-white">Teacher</a>
          </li>
          <li class="nav-item student-sidebar">
            <a href="/students" class="nav-link text-white">Student</a>
          </li>
        @elseif (auth()->user()->role == 'headmaster')
          <li class="nav-item home-sidebar">
            <a href="/" class="nav-link text-white" aria-current="page">Home</a>
          </li>
          <li class="nav-item school-sidebar">
            <a href="/school" class="nav-link text-white">School</a>
          </li>
          <li class="nav-item teacher-sidebar">
            <a href="/teacher" class="nav-link text-white">Teacher</a>
          </li>
          <li class="nav-item student-sidebar">
            <a href="/students" class="nav-link text-white">Student</a>
          </li>
        @elseif (auth()->user()->role == 'teacher')
          <li class="nav-item home-sidebar">
            <a href="/" class="nav-link text-white" aria-current="page">Home</a>
          </li>
          <li class="nav-item school-sidebar">
            <a href="/school" class="nav-link text-white">School</a>
          </li>
          <li class="nav-item student-sidebar">
            <a href="/students" class="nav-link text-white">Student</a>
          </li>
        @elseif (auth()->user()->role == 'student')
          <li class="nav-item home-sidebar">
            <a href="/" class="nav-link text-white" aria-current="page">Home</a>
          </li>
          <li class="nav-item school-sidebar">
            <a href="/school" class="nav-link text-white">School</a>
          </li>
          <li class="nav-item student-sidebar">
            <a href="/students" class="nav-link text-white">Student</a>
          </li>
        @endif
      @endauth
    </ul>
    <hr>
    @guest
      <a class="btn btn-primary" aria-current="page" href="/auth/login?method=GET">Login</a>
    @endguest
    @auth
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>{{ auth()->user()->name }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
          <form action="{{ route('auth.logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="dropdown-item">Logout</button>
          </form>
        </li>
      </ul>
    </div>
  @endauth
</div>
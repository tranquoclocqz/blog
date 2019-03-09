<nav class="navbar-header navbar navbar-expand-lg bg-dark navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">{{ (Auth::guard('admins')->user()->name) }}</a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">Xem trang web <span class="sr-only">(current)</span></a>
      </li>
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Công cụ
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
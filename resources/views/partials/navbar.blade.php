<style>
  nav .nav-link::after {
    content: '';
    display: block;
    width: 0;
    border-bottom: 0.5px rgba(0, 0, 0, 0.55) solid;
    transition: width .3s linear;
  }

  nav .custom-nav-link:hover::after {
    width: 100%;
  }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-light bg-light position-fixed top-0 start-0 w-100">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar brand -->
    <a class="navbar-brand" href="{{ route('homepage') }}">
      <img src="{{ asset('images/Logo.svg') }}" height="20" alt="" loading="lazy" />
    </a>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-0 align-items-center">
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="#">Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="#">Projects</a>
        </li>
      </ul>
      <!-- Left links -->
      @guest
      <ul class="navbar-nav align-items-center">
        <li class="nav-item custom-nav-link">
          <a class="nav-link custom-nav-link" href="{{ route('sign-up') }}">加入冒險</a>
        </li>
        <li class="nav-item custom-nav-link">
          <a class="nav-link custom-nav-link" href="{{ route('sign-in') }}">旅人簽到</a>
        </li>
      </ul>
      @endguest
      @auth
      <!-- Avatar -->
      <ul class="navbar-nav align-items-center">
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="{{ route('favorites.index') }}">
            <i class="fas fa-crosshairs me-1"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="{{ route('favorites.index') }}">
            <i class="fas fa-search me-1"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="{{ route('maps.index') }}">
            <i class="fas fa-map me-1"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="{{ route('favorites.index') }}">
            <i class="fas fa-star me-1"></i>我的收藏
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="{{ route('backstage.maps.index') }}">
            <i class="fas fa-map-marked me-1" ></i>我的地圖
          </a>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <a class="nav-link p-0 ms-3" href="{{ route('backstage.index') }}" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
              <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" class="rounded-circle me-1" height="30" alt="Avatar" loading="lazy" />
            </a>
            <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="dropdownMenuButton">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('favorites.index') }}">我的地圖</a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="logout_form.submit()">登出</a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
      <!-- Avatar -->
      @endauth
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->

{{--
<nav class="navbar navbar-expand-lg navbar-light position-fixed">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <a class="navbar-brand mt-2 mt-lg-0" href="{{ route('homepage') }}">
<img src="{{ asset('images/Logo.svg') }}" height="30" alt="Logo" loading="lazy" />
</a>
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
  <li class="nav-item">
    <a class="nav-link" href="#">
      地圖
    </a>
  </li>
</ul>
</div>
<div class="d-flex align-items-center">
  <button type="button" class="btn btn-outline-success me-3 d-none d-md-block" data-mdb-ripple-color="success">
    　有什麼好玩的？
  </button>
  @if (!Auth::check())
  <a class="text-reset me-3" href="{{ route('sign-in') }}" role="button">
    登入
  </a>
  <a class="text-reset me-3" href="{{ route('sign-up') }}" role="button">
    註冊
  </a>
  @else
  <a class="nav-link" href="{{ route('backstage.maps.index') }}">
    <i class="fas fa-map"></i>
    <span class="d-none d-md-inline">我的地圖</span>
  </a>
  <a class="nav-link" href="{{ route('favorites.index') }}">
    <i class="fas fa-star"></i>
    <span class="d-none d-md-inline">我的收藏</span>
  </a>
  <div class="dropdown">
    <a class="nav-link d-flex align-items-center" role="button" href="#" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
      <div class="ratio ratio-1x1 bg-primary me-1 rounded-circle" style="height: 2rem; width: 2rem;">
        <div></div>
      </div>
      {{ Auth::user()->name }}
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
      <li><a class="dropdown-item" href="#" onclick="logout_form.submit()">登出</a></li>
      <li><a class="dropdown-item" href="#">Another action</a></li>
      <li><a class="dropdown-item" href="#">Something else here</a></li>
    </ul>
  </div>
  @endif
</div>
</div>
</nav> --}}


@include('partials.form.logout-form')

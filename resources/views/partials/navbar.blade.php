<style>
  nav {
    width: 100%;
    z-index: 99999;
    height: 55px;
    top: 0;
  }
</style>

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
</nav>


@include('partials.form.logout-form')

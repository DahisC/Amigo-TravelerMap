<style>
  nav {
    width: 100%;
    z-index: 99999;
    height: 55px;
    top: 0;
  }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light position-fixed">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="{{ route('homepage') }}">
        <img src="{{ asset('images/Logo.svg') }}" height="30" alt="Logo" loading="lazy" />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">
            地圖
          </a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
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
        <a class="nav-link d-flex align-items-center" role="button" href="#" id="dropUser" data-mdb-toggle="dropdown" aria-expanded="false">
          <div class="ratio ratio-1x1 bg-primary me-1 rounded-circle" style="height: 2rem; width: 2rem;">
            <div></div>
          </div>
          {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropUser">
          <li><a class="dropdown-item" href="{{route('backstage.index')}}">個人後台</a></li>
          <li><a class="dropdown-item" href="#" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">登出</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </ul>
      </div>
      @endif

      <!-- Notifications -->
      {{-- <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-bell"></i>
        <span class="badge rounded-pill badge-notification bg-danger">1</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
        <li>
          <a class="dropdown-item" href="#">Some news</a>
        </li>
        <li>
          <a class="dropdown-item" href="#">Another news</a>
        </li>
        <li>
          <a class="dropdown-item" href="#">Something else here</a>
        </li>
      </ul> --}}

      <!-- Avatar -->
      {{-- <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
        <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" class="rounded-circle" height="25" alt="" loading="lazy" />
      </a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
        <li>
          123
        </li>
        <li>
          <a class="dropdown-item" href="#">Settings</a>
        </li>
        <li>
          <a class="dropdown-item" href="#">Logout</a>
        </li>
      </ul> --}}
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->

{{-- <style>
  nav {
    background-color: var(--bs-secondary);
    padding: 20px;
  }

  nav>ul {
    list-style-type: none;
    padding-left: 0;
  }

</style> --}}

{{-- <nav>
  <ul class="d-flex justify-content-between mb-0">
    <li>臨時導覽列</li>
    <li>
      <a href="/">Logo</a>
    </li>
    <li>
      <a href="{{ route('maps.index') }}">附近有什麼好玩的？</a>
</li>
<li>
  <a href="#">我關注的地點</a>
</li>
@if (Auth::check())
<li>
  <a href="#">{{ Auth::user()->name }}</a>
</li>
<li>
  <a href="#" onclick="logout_form.submit();">
    登出
  </a>

  <form id="logout_form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
  </form>
</li>
@else
<li>
  <a href="{{ route('sign-in') }}">旅人簽到</a>
</li>
<li>
  <a href="{{ route('sign-up') }}">新手上路</a>
</li>
@endif
</ul>
</nav> --}}

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

  nav {
    transition: transform .15s linear;
    transform: translateY(0%);
    /* height: 60px; */
  }

  nav.hide {
    transform: translateY(-100%);
  }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-light bg-primary position-fixed top-0 start-0 w-100 fixed-top shadow">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar brand -->
    <a class="navbar-brand m-0 p-0 me-3" href="{{ route('homepage') }}">
      <img class="m-0" src="{{ asset('images/Logo.svg') }}" alt="" loading="lazy" height="40" />
    </a>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-0 align-items-center">
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="{{ route('attractions.index') }}">
            <i class="fas fa-map-marker-alt me-1"></i>有趣的地點
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="{{ route('maps.index') }}">
            <i class="fas fa-map me-1"></i>地圖
          </a>
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
            <i class="fas fa-star me-1"></i>我的收藏
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link" href="{{ route('backstage.maps.index') }}">
            <i class="fas fa-map-marked-alt me-1"></i>我的地圖
          </a>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <a class="nav-link p-0 ms-3" href="{{ route('backstage.index') }}" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
              <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" class="rounded-circle me-1" height="30" alt="Avatar" loading="lazy" />
            </a>
            <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="dropdownMenuButton">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('backstage.index') }}">旅人之家</a>
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
@include('partials.form.logout-form')

@section('js')
<script>
  let lastScrollY = 0;
  const navEl = document.querySelector('nav');
  window.addEventListener('scroll', function() {
    if (this.scrollY > lastScrollY) navEl.classList.add('hide');
    else navEl.classList.remove('hide');

    lastScrollY = this.scrollY;

  })
</script>
@endsection
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    {{-- <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-map-marked"></i>
    </div> --}}
    <div class="sidebar-brand-text mx-3">
      Amigo
      <sub><i class="fas fa-wrench"></i></sub>
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="{{ route('backstage.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>儀表板</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    一般會員
  </div>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#">
      <i class="fas fa-fw fa-id-badge"></i>
      <span>檔案 Profile</span>
    </a>
  </li>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#database-maps">
      <i class="fas fa-fw fa-map"></i>
      <span>地圖 Maps</span>
    </a>
    <div id="database-maps" class="collapse">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">頁面</h6>
        <a class="collapse-item" href="{{route('backstage.maps.index')}}">列表 List</a>
        <a class="collapse-item" href="{{route('backstage.maps.create')}}">新增 Create</a>
      </div>
    </div>
  </li>
  <hr class="sidebar-divider">
  @can('view-guider')
  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#database-attractions">
      <i class="fas fa-fw fa-map-marker-alt"></i>
      <span>地點 Attractions</span>
    </a>
    <div id="database-attractions" class="collapse">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">頁面</h6>
        <a class="collapse-item" href="{{route('backstage.attractions.index')}}">列表 List</a>

        <a class="collapse-item" href="{{route('backstage.attractions.create')}}">新增 Create</a>
      </div>
    </div>
  </li>

  <hr class="sidebar-divider">
  @endcan

  @can('view-admin')
  <div class="sidebar-heading">
    管理員
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#database-users">
      <i class="fas fa-fw fa-users"></i>
      <span>用戶 Users</span>
    </a>
    <div id="database-users" class="collapse">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">頁面</h6>
        <a class="collapse-item" href="{{route('backstage.users.index')}}">列表 List</a>
        <a class="collapse-item" href="{{route('backstage.users.create')}}">新增 Create</a>
      </div>
    </div>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  @endcan

  {{-- <div class="sidebar-heading">
    快速連結
  </div>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('homepage') }}">
  <i class="fas fa-fw fa-star"></i>
  <span>Amigo 官方網站</span>
  </a>
  <a class="nav-link collapsed" href="{{ route('sign-up') }}">
    <i class="fas fa-fw fa-user-plus"></i>
    <span>註冊頁面</span>
  </a>
  <a class="nav-link collapsed" href="{{ route('sign-in') }}">
    <i class="fas fa-fw fa-feather-alt"></i>
    <span>登入頁面</span>
  </a>
  <a class="nav-link collapsed" href="{{ route('maps.index') }}">
    <i class="fas fa-fw fa-map"></i>
    <span>地圖頁面</span>
  </a>
  </li> --}}


  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
<!-- End of Sidebar -->

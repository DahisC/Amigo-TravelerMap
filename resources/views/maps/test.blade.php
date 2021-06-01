@extends('layouts.amigo')

@section('nav')

@endsection

@section('css')
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css    " /> --}}
  <!-- 引入Leaflet  -->
  <link rel="stylesheet" href="{{ asset('vendor/leaflet/leaflet.css') }}" />
  <style>
    .logo {
      width: 80px;
      height: 80px;
    }

    /*  */

    body {
      height: 100vh;
    }


    .test {
      z-index: 2;
    }

    #mapid {
      height: 100%;
      z-index: 1;
    }

    aside {
      z-index: 2;
      width: 20%;
    }

    .nav-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(45deg, var(--bs-light), #fff8dc);
      box-shadow: 0 0 10px 1px #f9f6ed;
    }

    .nav-icon>i {
      font-size: 20px;
      color: var(--bs-dark);
    }

    nav>div {
      /* margin-bottom: 20px; */
      margin: 10px;
    }


    .test {
      z-index: 2;
    }

    nav {
      /* background: linear-gradient(40deg, var(--bs-primary), var(--bs-secondary)); */
      background: url('images/sign-in.png') center center;
      background-size: cover;
      width: fit-content;
      height: fit-content;
    }

  </style>
@endsection

@section('content')
  <div class="test position-fixed d-flex flex-row flex-sm-column justify-content-between align-items-center p-3">
    <div class="logo rounded-circle bg-dark"></div>
    <nav class="rounded-pill d-flex flex-row flex-sm-column">

      <div class="nav-icon">
        <i class="fas fa-feather-alt"></i>
      </div>

      <div class="nav-icon">
        <i class="fas fa-user-plus"></i>
      </div>

      <hr class="mx-3" />

      <div class="nav-icon">
        <i class="fas fa-crosshairs"></i>
      </div>

      <div class="nav-icon" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
        <i class="fas fa-search"></i>
      </div>
    </nav>
  </div>

  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel"
    data-bs-backdrop="false">
    <div class="offcanvas-header">
      {{-- <h5 id="offcanvasRightLabel">Offcanvas right</h5> --}}
      <div class="d-flex align-items-center">

        <span class="badge rounded bg-primary me-1">
          <i class="fas fa-fw fa-search"></i>
          條件：
        </span>
        <span class="badge rounded-pill bg-primary me-1">
          景點
          <i class="fas fa-fw fa-times"></i>
        </span>
        <span class="badge rounded-pill bg-primary me-1">
          自然環境
          <i class="fas fa-fw fa-times"></i>
        </span>
        <span class="badge rounded-pill bg-primary">
          人為藝術
          <i class="fas fa-fw fa-times"></i>
        </span>
      </div>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr class="my-0" />
    <div class="container p-3">
      <div class="row">
        <div class="col">
          <div class="card mb-3">
            <div class="position-relative shadow" style="height: 200px;">
              <div class="position-absolute w-100 h-100">
                <div>
                  <span class="badge bg-primary d-block m-2" style="width: fit-content;">景點</span>
                  <span class="badge bg-primary d-block m-2" style="width: fit-content;">生態</span>
                </div>
                <button type="button" class="btn btn-primary btn-sm position-absolute end-0 bottom-0 m-2">
                  <i class="far fa-star"></i>
                  收藏
                </button>
              </div>
              <img src="https://www.eastcoast-nsa.gov.tw/image/40/640x480" class="h-100 card-img-top img-fluid"
                alt="當整個東海岸被層層的消坡塊鎖住時，綿延兩公里長的水璉牛山，卻散發出難能可貴的自然光采" />
            </div>
            <div class="card-body">
              <h6>水璉、牛山海岸</h6>
              <p class="card-text">水璉位在花蓮縣壽豐鄉海濱，蒼翠的山丘環抱著寬廣的河谷盆地，水璉溪蜿蜒而過，沿著公路邊的小徑往下，水璉濕地牛山海岸彷彿一片臨海的秘密樂園。</p>
              <div class="d-flex">
                <button type="button" class="btn btn-primary me-2 w-100">
                  <i class="fas fa-fw fa-map-marker-alt"></i>
                  地圖標示
                </button>
                <button type="button" class="btn btn-outline-primary w-100">
                  <i class="fas fa-fw fa-book-open"></i>
                  詳細資訊
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- <div class="test h-100 position-fixed bg-primary d-flex">
    <aside class="h-100 bg-dark" style="width: 200px;">
      123
    </aside>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div>
          Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists,
          etc.
        </div>
        <div class="dropdown mt-3">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
            data-bs-toggle="dropdown">
            Dropdown button
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </div>
      </div>
    </div>

  </div> --}}


  {{-- <aside class="position-fixed h-100 end-0 bg-white">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card mb-3">
            <div class="position-relative shadow" style="height: 200px;">
              <div class="position-absolute w-100 h-100">
                <div>
                  <span class="badge bg-primary d-block m-2" style="width: fit-content;">景點</span>
                  <span class="badge bg-primary d-block m-2" style="width: fit-content;">生態</span>
                </div>
                <button type="button" class="btn btn-primary btn-sm position-absolute end-0 bottom-0 m-2">
                  <i class="far fa-star"></i>
                  收藏
                </button>
              </div>
              <img src="https://www.eastcoast-nsa.gov.tw/image/40/640x480" class="h-100 card-img-top img-fluid"
                alt="當整個東海岸被層層的消坡塊鎖住時，綿延兩公里長的水璉牛山，卻散發出難能可貴的自然光采" />
            </div>
            <div class="card-body">
              <h6>水璉、牛山海岸</h6>
              <p class="card-text">水璉位在花蓮縣壽豐鄉海濱，蒼翠的山丘環抱著寬廣的河谷盆地，水璉溪蜿蜒而過，沿著公路邊的小徑往下，水璉濕地牛山海岸彷彿一片臨海的秘密樂園。</p>
              <div class="d-flex">
                <button type="button" class="btn btn-primary me-2 w-100">
                  <i class="fas fa-fw fa-map-marker-alt"></i>
                  地圖標示
                </button>
                <button type="button" class="btn btn-outline-primary w-100">
                  <i class="fas fa-fw fa-book-open"></i>
                  詳細資訊
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </aside> --}}

  @include('partials.maps.create-map-button-modal')

  <!-- 地圖 -->
  <div id="mapid"></div>
@endsection

@section('js')
  <script src="{{ asset('vendor/leaflet/leaflet.js') }}"></script>

  <script>
    //地圖
    var mymap = L.map("mapid").setView([24.194, 120.54535], 15);
    var map = L.tileLayer(
      "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}", {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: "mapbox/streets-v11",
        tileSize: 512,
        zoomOffset: -1,
        accessToken: "pk.eyJ1IjoiYWN0aXZpdGExNTkiLCJhIjoiY2tvcGRiZWlzMGJ1ODJ2a2hoamd0MGsxbyJ9.Kpk1ux9XXckK6NPE-qPhlw",

      }
    );

    map.addTo(mymap);
    mymap.zoomControl.setPosition("bottomleft");

  </script>
@endsection

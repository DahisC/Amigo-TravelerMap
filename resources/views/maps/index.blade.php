@extends('layouts.amigo')

@section('nav')

@endsection

@section('css')
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css    " /> --}}
  <!-- 引入Leaflet  -->
  <link rel="stylesheet" href="{{ asset('vendor/leaflet/leaflet.css') }}" />
  <style>
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
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(45deg, var(--bs-light), #fff8dc);
      box-shadow: 0 0 10px 1px #f9f6ed;
      text-decoration: none;
    }

    .nav-icon>i {
      font-size: 20px;
      color: var(--bs-dark);
    }

    nav>.nav-icon {
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

    /* Custom offCanvas */
    @media (min-width: 576px) {
      .logo {
        width: 80px;
        height: 80px;
      }

      .nav-icon {
        width: 40px;
        height: 40px;
      }

      .nav-icon>i {
        font-size: 20px;
      }

      .offcanvas-custom {
        top: 0;
        right: 0;
        left: unset;
        width: 400px;
        border-left: 1px solid rgba(0, 0, 0, 0.2);
        transform: translateX(100%);
      }

      .attraction-card {
        max-width: 335px;
      }

      .attraction-card__top {
        height: 167px;
      }

      .attraction-card__bot {
        height: 168px;
      }
    }

    @media (max-width: 575px) {
      .logo {
        width: 60px;
        height: 60px;
      }

      .nav-icon {
        width: 30px;
        height: 30px;
      }

      .nav-icon>i {
        font-size: 15px;
      }

      .offcanvas-custom {
        right: 0;
        left: 0;
        height: 50vh;
        max-height: 100%;
        border-top: 1px solid rgba(0, 0, 0, 0.2);
        -webkit-transform: translateY(100%);
        transform: translateY(100%);
      }

      .attraction-card {
        max-width: 50%;
      }

      .attraction-card__top {
        height: 40%;
      }
    }

  </style>
@endsection

@section('content')
  <div class="test position-fixed d-flex flex-row flex-sm-column justify-content-between align-items-center p-3">
    <div class="logo rounded-circle bg-dark shadow"></div>
    <nav class="rounded-pill d-flex flex-row flex-sm-column shadow">


      <a class="nav-icon" data-bs-toggle="modal" data-bs-target="#search-attraction-modal" href="">
        <i class="fas fa-feather-alt"></i>
      </a>


      <a class="nav-icon" href="">
        <i class="fas fa-user-plus"></i>
      </a>

      <hr class="mx-3" />

      <a class="nav-icon" href="">
        <i class="fas fa-crosshairs"></i>
      </a>

      {{-- <a class="nav-icon d-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
        aria-controls="offcanvasRight">
        <i class="fas fa-search"></i>
      </a> --}}
      <a class="nav-icon" href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
        aria-controls="offcanvasRight">
        <i class="fas fa-search"></i>
      </a>
    </nav>
  </div>

  <div class="offcanvas offcanvas-custom bg-white" tabindex="-1" id="offcanvasRight"
    aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      {{-- <h5 id="offcanvasRightLabel">Offcanvas right</h5> --}}
      <div class="d-flex align-items-center">
        {{-- <span class="badge rounded bg-primary me-1">
          <i class="fas fa-fw fa-search"></i>
          條件：
        </span> --}}
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#search-attraction-modal">
            Launch demo modal
          </button> --}}
        <a class="nav-icon mx-1" href="#" data-bs-toggle="modal" data-bs-target="#search-attraction-modal">
          <i class="fas fa-search"></i>
        </a>
        <span class="badge rounded-pill bg-primary mx-1">
          景點
          <i class="fas fa-fw fa-times"></i>
        </span>
        <span class="badge rounded-pill bg-primary mx-1">
          自然環境
          <i class="fas fa-fw fa-times"></i>
        </span>
        <span class="badge rounded-pill bg-primary mx-1">
          人為藝術
          <i class="fas fa-fw fa-times"></i>
        </span>
      </div>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr class="my-0" />
    <div class="p-3 p-sm-4  overflow-auto d-flex flex-row flex-sm-column">
      {{--  --}}
      @foreach ($attractions->take(10) as $a)
        <div class="attraction-card card mb-0 mb-sm-3 mx-2 me-sm-0 flex-shrink-0">
          <div class="attraction-card__top position-relative shadow flex-shrink-0">
            <div class="position-absolute w-100 h-100">
              <div>
                <span class="badge bg-primary d-block m-2" style="width: fit-content;">景點</span>
                <span class="badge bg-primary d-block m-2" style="width: fit-content;">生態</span>
              </div>
              <button type="button" class="btn btn-primary btn-sm position-absolute end-0 bottom-0 m-2"
                style="font-size: 0.8rem;">
                <i class="far fa-star"></i>
                <span class="d-none d-sm-inline">收藏</span>
              </button>
            </div>
            <img src="{{ $a->Picture1 ?? 'https://cdn.pixabay.com/photo/2014/12/21/09/33/map-574792_960_720.jpg' }}"
              alt="{{ $a->Picdescribe1 }}" class="h-100 card-img-top img-fluid"
              alt="當整個東海岸被層層的消坡塊鎖住時，綿延兩公里長的水璉牛山，卻散發出難能可貴的自然光采" />
          </div>
          <div class="attraction-card__bot card-body d-flex flex-column justify-content-between overflow-auto">
            <h6 class="text-primary">{{ $a->name }}</h6>
            <p class="card-text" style="font-size: 0.9rem;">{{ $a->description }}</p>
            <div class="d-flex">
              <button type="button" class="btn btn-primary btn-sm me-2 w-100">
                <i class="fas fa-fw fa-map-marker-alt"></i>
                <span class="d-none d-sm-inline">地圖標示</span>
              </button>
              <button type="button" class="btn btn-outline-primary btn-sm w-100">
                <i class="fas fa-fw fa-book-open"></i>
                <span class="d-none d-sm-inline">詳細資訊</span>
              </button>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <div class="fade modal" id="page-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">搜尋景點</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  @include('partials.maps.search-attraction-modal')
  {{-- @include('partials.maps.create-map-modal') --}}

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

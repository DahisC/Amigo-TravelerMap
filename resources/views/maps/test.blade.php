@extends('layouts.amigo')

@section('nav')

@endsection

@section('css')
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css    " /> --}}
  <!-- 引入Leaflet  -->
  <link rel="stylesheet" href="{{ asset('vendor/leaflet/leaflet.css') }}" />
  <style>
    aside {
      z-index: 2;
    }

    #mapid {
      height: 100vh;
      z-index: 1;
    }

  </style>
@endsection

@section('content')
  <!-- aside -->
  {{-- <div class="dropdown position-absolute end-0" style="z-index: 99999;">
      <a class="btn btn-primary dropdown-toggle me-1" href="#" role="button" id="dropdownMenuLink"
        data-bs-toggle="dropdown" aria-expanded="false">
        Dropdown link
      </a>
      <nav class="position-absolute end-0 overflow-auto dropdown-menu" aria-labelledby="dropdownMenuLink"
        style="width: 400px; height:calc(100vh - 40px); z-index: 1000; background-color: white">
        <div class="input-group mb-3">
          <button class="btn btn-secondary" type="button" id="button-addon1">
            <i class="fas fa-search"></i>
          </button>
          <input type="text" class="form-control" placeholder="顯示附近景點" aria-label="Recipient's username"
            aria-describedby="button-addon1" />
        </div>

        <div class="card m-auto mb-3" style="width: 90%">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              Some quick example text to build on the card title and make up the
              bulk of the card's content.
            </p>
            <div class="d-flex">
              <button type="button" class="btn btn-light">標籤</button>
              <button type="button" class="btn btn-light">標籤</button>
              <a href="#" class="btn btn-info ms-auto">導航</a>
            </div>
          </div>
        </div>
        <div class="card m-auto mb-3" style="width: 90%">
          <img src="..." class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              Some quick example text to build on the card title and make up the
              bulk of the card's content.
            </p>
            <div class="d-flex">
              <button type="button" class="btn btn-light">標籤</button>
              <button type="button" class="btn btn-light">標籤</button>
              <a href="#" class="btn btn-info ms-auto">導航</a>
            </div>
          </div>
        </div>
        <div class="card m-auto mb-3" style="width: 90%">
          <img src="..." class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">
              Some quick example text to build on the card title and make up the
              bulk of the card's content.
            </p>
            <div class="d-flex">
              <button type="button" class="btn btn-light">標籤</button>
              <button type="button" class="btn btn-light">標籤</button>
              <a href="#" class="btn btn-info ms-auto">導航</a>
            </div>
          </div>
        </div>
      </nav>
    </div> --}}

  <aside class="position-fixed w-25 h-100 end-0 bg-light">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card mb-3">
            <div class="position-relative">
              <div class="position-absolute w-100 h-100">
                <div>
                  <span class="badge bg-primary m-2 d-block" style="width: fit-content;">景點</span>
                  <span class="badge bg-primary m-2 d-block" style="width: fit-content;">生態</span>
                </div>
                <button type="button" class="btn btn-primary btn-sm position-absolute end-0 right-0">
                  {{-- <i class="fas fa-star"></i> --}}
                  <i class="far fa-star"></i>
                  收藏
                </button>
              </div>
              <img src="https://www.eastcoast-nsa.gov.tw/image/40/640x480" class="card-img-top"
                alt="當整個東海岸被層層的消坡塊鎖住時，綿延兩公里長的水璉牛山，卻散發出難能可貴的自然光采" />
            </div>


            {{-- 卡片主體 --}}
            <div class="card-body">
              <h6>水璉、牛山海岸</h6>
              <p class="card-text">水璉位在花蓮縣壽豐鄉海濱，蒼翠的山丘環抱著寬廣的河谷盆地，水璉溪蜿蜒而過，沿著公路邊的小徑往下，水璉濕地牛山海岸彷彿一片臨海的秘密樂園。</p>
              <div>
                <button class="btn btn-outline-primary">
                  <i class="fas fa-fw fa-map-marker-alt"></i>
                  地圖標示
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </aside>

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

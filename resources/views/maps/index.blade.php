@extends('layouts.amigo')

@section('nav')

@endsection

@section('css')
  <!-- 引入Leaflet  -->
  <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}" />
  {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/MarkerCluster.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/MarkerCluster.Default.css"> --}}

  <style>
    /*  */

    body {
      height: 100vh;
    }


    .test {
      z-index: 2;
    }

    #traveler-map {
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
      background: url("{{ asset('images/sign-in.png') }}") center center;
      background-size: cover;
      width: fit-content;
      height: fit-content;
    }

    /* marker group */
    .marker-cluster-small {
      background-color: rgba(181, 226, 140, 0.6);
    }

    .marker-cluster-small div {
      background-color: rgba(110, 204, 57, 0.6);
    }

    .marker-cluster-medium {
      background-color: rgba(241, 211, 87, 0.6);
    }

    .marker-cluster-medium div {
      background-color: rgba(240, 194, 12, 0.6);
    }

    .marker-cluster-large {
      background-color: rgba(253, 156, 115, 0.6);
    }

    .marker-cluster-large div {
      background-color: rgba(241, 128, 23, 0.6);
    }

    .marker-cluster {
      background-clip: padding-box;
      border-radius: 20px;
    }

    .marker-cluster div {
      width: 30px;
      height: 30px;
      margin-left: 5px;
      margin-top: 5px;

      text-align: center;
      border-radius: 15px;
      font: 12px "Helvetica Neue", Arial, Helvetica, sans-serif;
    }

    .marker-cluster span {
      line-height: 30px;
    }

    /* marker group */


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
  <div id="app" class="h-100">
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
        <a id="btn_locateSelf" class="nav-icon" href="">
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

    <div class="offcanvas offcanvas-custom bg-white" id="offcanvasRight" data-bs-backdrop="false">
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
      <div id="test" class="p-3 p-sm-4 overflow-auto d-flex flex-row flex-sm-column">
        {{--  --}}
        <div v-for="attraction in attractions" class="attraction-card card mb-0 mb-sm-3 mx-2 me-sm-0 shadow">
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
            <img :src="'https://cdn.pixabay.com/photo/2014/12/21/09/33/map-574792_960_720.jpg'"
                 class="h-100 card-img-top img-fluid" />
          </div>
          <div class="attraction-card__bot card-body d-flex flex-column justify-content-between overflow-hidden">
            <h6 class="text-primary">@{{ attraction . name }}</h6>
            <p class="card-text overflow-hidden" style="font-size: 0.9rem;">@{{ attraction . description }}</p>
            <div class="d-flex">
              <button type="button" class="btn btn-primary btn-sm me-2 w-100 guide">
                <i class="fas fa-fw fa-map-marker-alt"></i>
                <span class="d-none d-sm-inline">地圖標示</span>
              </button>
              <button type="button" class="btn btn-outline-primary btn-sm w-100" data-bs-toggle="modal"
                      data-bs-target="#exampleModal">
                <i class="fas fa-fw fa-book-open"></i>
                <span class="d-none d-sm-inline">詳細資訊</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('partials.maps.attraction-detail-modal')
    {{-- @include('partials.maps.search-attraction-modal', compact('tags')) --}}
    {{-- @include('partials.maps.create-map-modal') --}}

    <!-- 地圖 -->
    <div id="traveler-map"></div>
  </div>



@endsection

@section('js')
  <script src="{{ asset('js/leaflet.js') }}"></script>

  <script>
    /* 後端變數 */
    const attractions = {!! json_encode($attractions->toArray()) !!};
    /* Leaflet 設置 */
    const map = L.map('traveler-map').setView([24.124508620246154, 120.67601680755617], 15);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: 'pk.eyJ1IjoiZGFoaXNjIiwiYSI6ImNrOTVmZ24xNzBiM2wzZXAycnNxYTJoemgifQ.y51LxBKtrU9iu_Z8O8sSEQ'
    }).addTo(map);

    // 地圖縮放工具列位置
    map.zoomControl.setPosition("bottomleft");

    // 使用者 Marker 外觀
    const userIcon = L.icon({
      iconUrl: "./images/lovelyicon.png",
      iconSize: [50, 50],
    });

    // 使用者 Marker 物件
    const userMarker = L.marker([0, 0], {
      opacity: 0,
      draggable: true,
      icon: userIcon,
      autoPan: true,
      autoPanPadding: [200, 200],
      autoPanSpeed: 25,
    });

    /* Leaflet 處理函式 */
    // 定位自己
    btn_locateSelf.addEventListener('click', locateUser);

    function locateUser(e) {
      e.preventDefault();
      if (navigator.geolocation) {
        const options = {
          enableHighAccuracy: true
        };

        const locateSuccessHandler = (position) => {
          const {
            latitude,
            longitude
          } = position.coords;
          const userPosition = [latitude, longitude];
          flyToUserPosition(userPosition);
        };

        const locateFailedHandler = () => {
          alert('定位失敗。');
        };

        navigator.geolocation.getCurrentPosition(locateSuccessHandler, locateFailedHandler, options);
      } else {
        alert("抱歉！瀏覽器不支援 Geolocation");
      }

      function flyToUserPosition(userPosition = []) {
        map.flyTo(userPosition, 15, {
          animate: true,
          // duration: 2
        });
        userMarker.setLatLng(userPosition).setOpacity(1).addTo(map);
      }
    }

    // 當使用者移動定位標籤後
    userMarker.addEventListener('moveend', onUserMarkerMoved);
    async function onUserMarkerMoved() {
      const params = {
        lat,
        lng
      } = this.getLatLng();
      const response = await axios.get('/api/attractions', {
        params
      });
      $vue.updateAttractions(response.data.attractions);
      renderMarkersOnMap(response.data.attractions);
    }

    // 將 Markers 算繪至地圖上
    function renderMarkersOnMap(attractions) {
      console.log(attractions);
      const markers = new L.MarkerClusterGroup().addTo(map);
      attractions.forEach(a => {
        markers.addLayer(L.marker([a.position.lat, a.position.lng], {
          icon: userIcon
        }).bindPopup(`<b>${a.name}</b><br>${a.tel}<br>${a.position.address}`));
      })
    }

    /* Vue */
    $vue = new Vue({
      el: '#app',
      data: {
        attractions,
        attractionDetailTarget: {}
      },
      methods: {
        updateAttractions(attractions) {
          this.attractions = attractions;
        }
      }
    });






    // function getUserPositionQueryString() {
    //   const url = new URL(window.location.href);
    //   const params = new URLSearchParams(url.search);
    //   const px = params.get('px');
    //   const py = params.get('py');
    //   if (px && py) flyToUserPosition([py, px], false);
    // }

    // function updateUserPositionQueryString([px, py]) {
    //   const url = new URL(window.location.href);
    //   const params = new URLSearchParams(url.search);
    //   params.set('px', px);
    //   params.set('py', py);
    //   window.location.replace(url.origin + url.pathname + '?' + params);
    // }







    // var data = [];
    // for (var i = 0; i < object.length; i++) {
    //   data.push({
    //     "Name": object[i].name,
    //     "Px": object[i].position.px,
    //     "Py": object[i].position.py,
    //     "Tel": object[i].tel,
    //     "Add": object[i].position.address
    //   })
    //   markers.addLayer(L.marker([data[i].Py, data[i].Px], {
    //     icon: customIcon
    //   }).bindPopup(`<b>${data[i].Name}</b><br>${data[i].Tel}<br>${data[i].Add}`));
    // }

    // const guideToBtn = document.querySelectorAll('.guide');
    // guideToBtn.forEach(function(value, index) {
    //   value.setAttribute('data-index', index);
    //   value.addEventListener('click', function() {
    //     var dataindex = this.getAttribute("data-index");
    //     mymap.flyTo([data[dataindex].Py, data[dataindex].Px], 15, {
    //       animate: true,
    //       duration: 2
    //     });
    //   })
    // })

  </script>
@endsection

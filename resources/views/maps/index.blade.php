@extends('layouts.amigo')

@section('nav')

@endsection

@section('css')
<!-- 引入Leaflet  -->
<link rel="stylesheet" href="{{ asset('css/leaflet.css') }}" />
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/MarkerCluster.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/MarkerCluster.Default.css"> --}}

<style>
  .form-check-input~.card {
    border: 2px solid rgba(0, 0, 0, 0);
  }

  .form-check-input:checked~.card {
    border: 2px solid var(--mdb-primary);
  }

  /* */

  body {
    height: 100vh;
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

  nav {
    /* background: linear-gradient(40deg, var(--bs-primary), var(--bs-secondary)); */
    /* background: url("{{ asset('images/sign-in.png') }}") center center; */
    /* background-size: cover; */
    background-color: rgba(254, 250, 238, 0.5);
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
  @media (min-width: 768px) {
    .logo {
      width: 80px;
      height: 80px;
    }

    /* .nav-wrapper {
      height: 100%;
    } */

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

  @media (max-width: 767px) {
    .logo {
      width: 60px;
      height: 60px;
    }

    /* .nav-wrapper {
      width: 100%;
    } */

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
  <div class="h-100 w-100 position-absolute p-2 p-md-3 d-flex flex-column flex-md-row justify-content-start justify-content-md-between" style="z-index: 2; pointer-events: none;">
    <div class="nav-wrapper d-flex flex-row flex-md-column align-items-center justify-content-center" style="pointer-events: auto;">
      <div class="logo rounded-circle shadow bg-primary @if (isset($map)) mb-auto @endif"></div>
      @if (!isset($map))
      <nav class="rounded-pill d-flex flex-row flex-md-column p-1 my-md-auto ms-auto ms-md-0 shadow">
        @can('view-auth')
        {{-- 會員後台的按鈕，記得更新 --}}
        <a href="{{ route('sign-in') }}" class="btn btn-primary btn-floating m-1">
          <i class="fas fa-feather-alt"></i>
        </a>
        @else
        {{-- 遊客看見的按鈕 --}}
        <a href="{{ route('sign-in') }}" class="btn btn-primary btn-floating m-1">
          <i class="fas fa-feather-alt"></i>
        </a>
        <a href="{{ route('sign-up') }}" class="btn btn-primary btn-floating m-1">
          <i class="fas fa-user-plus"></i>
        </a>
        @endcan
        <hr class="mx-2" />
        <button type="button" class="btn btn-primary btn-floating m-1" onclick="locateUser(event)">
          <i class="fas fa-crosshairs"></i>
        </button>
        {{-- <button type="button" class="btn btn-primary btn-floating m-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <i class="fas fa-search"></i>
          </button> --}}
        <button type="button" class="btn btn-primary btn-floating m-1" data-bs-toggle="modal" data-bs-target="#search-attraction-modal">
          <i class="fas fa-search"></i>
        </button>
        <button type="button" class="btn btn-primary btn-floating m-1">
          <i class="fas fa-map"></i>
        </button>
      </nav>
      @endif
    </div>
    @if (isset($map))
    <div class="shadow rounded bg-primary px-3 py-2 ms-auto ms-md-0" style="height: fit-content; width: fit-content; font-size: 0.8rem; pointer-event: auto;">
      {{ $map->name }}｜<i class="fas fa-user"></i> {{ $map->user->name }}
    </div>
    @endif
    <div class="shadow mt-auto mt-md-0 mx-auto mx-md-0" style="height: fit-content; width: fit-content;">
      <button type="button" class="btn btn-primary top-0 end-0" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="pointer-events: auto;">
        <i class="fas fa-bars me-1"></i>
        <span class="text-dark">@{{ attractions.length }} 個地點</span>
      </button>
    </div>
  </div>
  <div id="traveler-map"></div>
  <div class="offcanvas offcanvas-custom bg-white" id="offcanvasRight" data-bs-backdrop="false">
    <div class="offcanvas-header shadow">
      <div class="d-flex align-items-center">
        {{-- <button type="button" class="btn btn-outline-primary btn-floating" data-mdb-ripple-color="dark" data-bs-toggle="modal" data-bs-target="#search-attraction-modal">
            <i class="fas fa-search"></i>
          </button> --}}
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
      <div v-for="attraction in attractions" class="attraction-card card mb-0 mb-sm-3 mx-2 me-sm-0 shadow flex-shrink-0">
        <div class="attraction-card__top position-relative shadow flex-shrink-0">
          <div class="position-absolute w-100 h-100">
            <div>
              <span v-for="tag in attraction.tags" class="badge d-block m-2" style="width: fit-content;" :style="{ 'background-color': tag.color }">@{{ tag.name }}</span>
              {{-- <span class="badge bg-primary d-block m-2" style="width: fit-content;">景點</span>
                <span class="badge bg-primary d-block m-2" style="width: fit-content;">生態</span> --}}
            </div>
            <button type="button" class="btn btn-primary btn-sm btn-floating position-absolute end-0 bottom-0 m-2" style="font-size: 0.8rem;" v-on:click="addToFavorite(attraction.id)">
              <i v-if="isFavorited(attraction.id)" class="far fa-star"></i>
              <i v-else class="fas fa-star"></i>
              {{-- <span class="d-none d-sm-inline">收藏</span> --}}
            </button>
          </div>
          <img v-if="attraction.images.length !== 0" :src="attraction.images[0].url" class="h-100 card-img-top img-fluid" />
          <img v-else :src="'https://cdn.pixabay.com/photo/2014/12/21/09/33/map-574792_960_720.jpg'" class="h-100 card-img-top img-fluid" />
        </div>
        <div class="attraction-card__bot card-body d-flex flex-column justify-content-between overflow-hidden">
          <h6 class="text-primary">@{{ attraction . name }}</h6>
          <p class="card-text overflow-hidden" style="font-size: 0.9rem;">@{{ attraction . description }}</p>
          <div class="d-flex">
            <button type="button" class="btn btn-primary btn-sm me-2 w-100 guide" v-on:click="locateOnMap(attraction)">
              <i class="fas fa-fw fa-map-marker-alt"></i>
              <span class="d-none d-sm-inline">地圖標示</span>
            </button>
            <button type="button" class="btn btn-outline-primary btn-sm w-100" data-bs-toggle="modal" data-bs-target="#attraction-detail-modal" v-on:click="detailTarget = attraction">
              <i class="fas fa-fw fa-book-open"></i>
              <span class="d-none d-sm-inline">詳細資訊</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('partials.maps.attraction-detail-modal')
  @include('partials.maps.search-attraction-modal')
  {{-- @include('partials.maps.create-map-modal') --}}
</div>



@endsection

@section('js')
@stack('stack-js')
<script src="{{ asset('js/leaflet.js') }}"></script>

<script>
  /* 後端變數 */
  const addressLatLng = @json($addressLatLng);
  const attractions = @json($attractions);
  const userFavorites = @json($userFavorites);

  //   if (addressLatLng) locateUser(addressLatLng)
  //   else locateUser({ lat: 22.627278, lng: 120.301435 }); // for test

  // 使用者 Marker 外觀
  const userIcon = L.icon({ iconUrl: "/images/map/050-street-view.png", iconSize: [30, 30], });
  const viewIcon = L.icon({ iconUrl: "/images/map/023-pin-10.png", iconSize: [30, 30], });
  const festivalIcon = L.icon({ iconUrl: "/images/map/022-pin-9.png", iconSize: [30, 30], });
  const artIcon = L.icon({ iconUrl: "/images/map/010-pin-3.png", iconSize: [30, 30], });


  // 使用者 Marker 物件
  const userMarker = L.marker([0, 0], {
    opacity: 0,
    draggable: true,
    icon: userIcon,
    autoPan: true,
    autoPanPadding: [200, 200],
    autoPanSpeed: 25,
  });


  /* Vue */
  $vue = new Vue({
    el: '#app',
    data: {
      map: null,
      attractions: attractions || [],
      detailTarget: {},
      userFavorites: userFavorites || [],
    },
    mounted() {
      this.$refs.userMarker = userMarker;
      this.$refs.userMarker.addEventListener('moveend', this.onUserMarkerMoved)
      //   userMarker.addEventListener('moveend', this.onUserMarkerMoved);
      console.log(userMarker);
      this.initLeaflet();
      this.updateAttractions({ attractions, userFavorites })

      if (addressLatLng) this.locateUser(addressLatLng)
      //   if (addressLatLng) locateUser(addressLatLng)
      //   else locateUser({ lat: 22.627278, lng: 120.301435 }); // for test
    },
    methods: {
      initLeaflet() {
        /* Leaflet 設置 */
        this.map = L.map('traveler-map', { zoomControl: false }).setView([24.131871399999998, 120.67749420000001], 15);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
          //   attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
          maxZoom: 18,
          id: 'mapbox/streets-v11',
          tileSize: 512,
          zoomOffset: -1,
          accessToken: 'pk.eyJ1IjoiZGFoaXNjIiwiYSI6ImNrOTVmZ24xNzBiM2wzZXAycnNxYTJoemgifQ.y51LxBKtrU9iu_Z8O8sSEQ'
        }).addTo(this.map);

        // 地圖縮放工具列位置
        // this.map.zoomControl.setPosition("bottomleft");
      },
      updateAttractions({ attractions, userFavorites }) {
        this.attractions = attractions;
        this.userFavorites = userFavorites;
        this.renderMarkersOnMap(attractions);
      },
      locateOnMap(attraction) {
        const { lat, lng } = attraction.position;
        this.map.flyTo([lat, lng], 17);
      },
      async addToFavorite(attractionId) {
        const { data } = await axios.patch(`/attractions/${attractionId}/favorite`);
        const { userFavorites } = data;
        this.userFavorites = userFavorites;
      },
      isFavorited(attractionId) {
        return this.userFavorites.includes(attractionId);
      },
      // 將 Markers 算繪至地圖上
      renderMarkersOnMap(attractions) {
        const markers = new L.MarkerClusterGroup().addTo(this.map);
        attractions.forEach(a => {
          markers.addLayer(L.marker([a.position.lat, a.position.lng], {
            icon: defineMarkerIcon(a.tags[0])
          }).bindPopup(`<b>${a.name}</b><br>${a.tel}<br>${a.position.address}`));
        });

        function defineMarkerIcon(attractionTag) {
          switch (attractionTag.name) {
            case '景點':
              return viewIcon;
            case '節慶':
              return festivalIcon;
            case '藝術':
              return artIcon;
            default:
              return viewIcon;
          }
        }
      },
      /* Leaflet 處理函式 */
      // 定位自己
      locateUser(customPosition) {
        const vue = this;
        if (navigator.geolocation) {
          const options = { enableHighAccuracy: true };

          const locateSuccessHandler = (position) => {
            const { latitude: lat, longitude: lng } = position.coords;
            if (customPosition.lat && customPosition.lng) flyToUserPosition({ lat: customPosition.lat, lng: customPosition.lng })
            else flyToUserPosition({ lat, lng });
          };

          const locateFailedHandler = () => { alert('定位失敗。'); };

          navigator.geolocation.getCurrentPosition(locateSuccessHandler, locateFailedHandler, options);
        } else {
          alert("抱歉！瀏覽器不支援 Geolocation");
        }

        function flyToUserPosition({ lat, lng }) {
          vue.map.flyTo([lat, lng], 15);
          userMarker.setLatLng([lat, lng]).setOpacity(1).addTo(vue.map);
          vue.onUserMarkerMoved({ lat, lng });
        }
      },
      async onUserMarkerMoved({ lat, lng }) {
        if (event) params = { lat, lng } = this.$refs.userMarker.getLatLng();
        else params = { lat, lng }
        const response = await axios.get('/api/attractions', { params });
        this.updateAttractions(response.data);
      }
    },

  });


  // 當使用者移動定位標籤後
  //   async function onUserMarkerMoved({ lat, lng }) {
  //     let params;
  //     if (event) params = { lat, lng } = this.getLatLng();
  //     else params = { lat, lng }
  //     const response = await axios.get('/api/attractions', { params });
  //     $vue.updateAttractions(response.data);
  //     // renderMarkersOnMap(response.data.attractions);
  //   }
</script>
@endsection

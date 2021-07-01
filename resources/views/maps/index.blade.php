@extends('layouts.amigo')

@section('title')
@if (isset($map))
檢視地圖：{{ $map->name }}
@else
探索附近的地點
@endif
@endsection

@section('nav')

@endsection

@section('css')
<!-- 引入Leaflet  -->
<link rel="stylesheet" href="{{ asset('css/leaflet.css') }}" />
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/MarkerCluster.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/MarkerCluster.Default.css"> --}}

<style>
  :root {
    --offcanvas-width: 0px;
  }

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
      width: 60px;
      height: 60px;
    }

    /* .nav-wrapper {
      height: 100%;
    } */

    .custom-offcanvas {
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
      width: 50px;
      height: 50px;
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

    .custom-offcanvas {
      right: 0;
      left: 0;
      height: 50vh;
      max-height: 100%;
      border-top: 1px solid rgba(0, 0, 0, 0.2);
      -webkit-transform: translateY(100%);
      transform: translateY(100%);
    }

    .attraction-card {
      max-width: 35%;
    }

    .attraction-card__top {
      height: 40%;
    }
  }

  @media (max-width: 575px) {
    .attraction-card {
      max-width: 50%;
    }
  }

  #custom-mask {
    width: 100%;
  }

  @media (min-width: 768px) {
    #custom-mask {
      width: calc(100% - var(--offcanvas-width));
      transition: width .3s ease-in-out;
    }
  }
</style>
@endsection

@section('content')
<?php
    $exploreMode = !isset($map);
    $viewMode = isset($map) && (!auth()->check() || (auth()->check() && auth()->user()->id !== $map->user_id));
    $editMode = isset($map) && auth()->check() && auth()->user()->id === $map->user_id;
?>

<div id="app" class="h-100">
  <div id="custom-mask" class="h-100 position-absolute p-2 p-md-3 d-flex flex-column flex-md-row justify-content-start justify-content-md-between" style="z-index: 2; pointer-events: none;">
    <div class="nav-wrapper d-flex flex-row flex-md-column align-items-center justify-content-center" style="pointer-events: auto;">
      {{-- <a class="@if (isset($map)) mb-auto @else mb-0 @endif" href="{{ route('homepage') }}">
      <div class="logo rounded-circle shadow a-background" style="background-image: url({{ asset('images/logo.svg') }});"></div>
      </a> --}}
      <nav class="rounded-pill d-flex flex-row flex-md-column p-1 my-md-auto mx-auto mx-md-0 shadow">
        <a href="{{ route('homepage') }}" class="btn btn-primary btn-floating m-1">
          <img src="{{ asset('/images/logo.svg') }}" class="rounded-circle me-1" width="100%" alt="Homepage" loading="lazy" />
        </a>
        @can('view-auth')
        {{-- 會員後台的按鈕，記得更新 --}}
        <a href="{{ route('backstage.index') }}" class="btn btn-primary btn-floating m-1">
          <img src="{{ auth()->user()->avatar }}" class="rounded-circle me-1" width="100%" alt="Avatar" loading="lazy" />
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
        {{-- @if (isset($map) && auth()->check() && auth()->user()->id === $map->user_id) --}}
        @if ($exploreMode || $editMode)
        <hr class="mx-2" />
        <button id="btn_locateUser" type="button" class="btn btn-primary btn-floating m-1" v-on:click="locateUser(this)">
          <i class="fas fa-crosshairs"></i>
        </button>
        {{-- <button type="button" class="btn btn-primary btn-floating m-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <i class="fas fa-search"></i>
          </button> --}}
        <button id="btn_searchAttractions" type="button" class="btn btn-primary btn-floating m-1" data-bs-toggle="modal" data-bs-target="#search-attraction-modal">
          <i class="fas fa-search"></i>
        </button>
        <button id="btn_createMap" type="button" class="btn btn-primary btn-floating m-1" onclick="event.preventDefault(); form_createMap.submit();">
          <i class="fas fa-map"></i>
        </button>
        <form id="form_createMap" method="POST" action="{{ route('maps.store') }}">
          @csrf
        </form>
        @endif
      </nav>
    </div>
    <div class="text-center shadow rounded bg-primary px-3 py-2 mx-auto mx-md-0 text-dark" style="height: fit-content; width: fit-content; font-size: 0.8rem; pointer-events: auto; user-select: none;">
      @if (!$exploreMode)
      @if ($editMode)
      <span id="info_editMode"><i class="fas fa-pen me-0 me-md-1"></i><span class="d-none d-md-inline">編輯模式</span></span>
      @endif
      @if ($viewMode)
      <span id="info_viewMode"><i class="fas fa-eye me-0 me-md-1"></i><span class="d-none d-md-inline">檢視模式</span></span>
      @endif
      ｜
      {{ $map->name }}
      ｜
      <a id="btn_export" class="text-dark" href="{{ route('maps.itineraries', ['map' => $map->id]) }}">匯出</a>
      @endif
      @if ($exploreMode)
      <span id="info_exploreMode"><i class="fas fa-search me-0 me-md-1"></i><span class="d-none d-md-inline">探索模式</span></span>
      @endif
    </div>
    <div class="shadow mt-auto mt-md-0 mx-auto mx-md-0" style="height: fit-content; width: fit-content;">
      <button id="btn_toggleOffcanvas" type="button" class="btn btn-secondary top-0 end-0" data-bs-toggle="offcanvas" data-bs-target="#custom-offcanvas" aria-controls="custom-offcanvas" style="pointer-events: auto;">
        <template v-if="isLoading">
          <span class="spinner-grow spinner-grow-sm me-1" role="status" aria-hidden="true"></span>
          {{-- 讀取中 --}}
        </template>
        <template v-else>
          <i class="fas fa-bars"></i>
          {{-- <span class="text-dark">@{{ attractions.length }} 個地點</span> --}}
        </template>
      </button>
    </div>
  </div>
  <div id="traveler-map"></div>
  <div id="custom-offcanvas" class=" offcanvas custom-offcanvas bg-white" data-bs-scroll="true" data-bs-backdrop="false">
    <div class="offcanvas-header shadow bg-primary">
      {{-- <div class="w-100 d-flex justify-content-between align-items-center" style="font-size: 0.9rem;">
        @if (isset($map))
        <div><i class="fas fa-fw fa-map me-1"></i>{{ $map->name }}</div>
    <div><i class="fas fa-fw fa-user me-1"></i>{{ $map->user->name }}</div>
    @else
    <div class="mx-auto">今天想去哪裡玩？</div>
    @endif
  </div> --}}
  <div class="w-100 d-flex justify-content-start align-items-center" style="font-size: 0.9rem;">
    @if (!$viewMode)
    <button id="btn_filtNothing" type="button" :class="filter === 'NOTHING' ? 'btn-dark' : 'btn-outline-dark'" class="btn btn-sm me-2" v-on:click="filter = 'NOTHING'">
      <i class="fas fa-fw fa-map-marker-alt"></i>
      所有 @{{ attractions.length }}
    </button>
    <button id="btn_filtFavorites" type="button" :class="filter === 'FAVORITED' ? 'btn-dark' : 'btn-outline-dark'" class="btn btn-sm me-2" v-on:click="filter = 'FAVORITED'">
      <i class="fas fa-fw fa-star"></i>
      收藏 @{{ userFavorites.length }}
    </button>
    @endif
    @if ($editMode || $viewMode)
    <button id="btn_filtPinned" type="button" :class="filter === 'PINNED' ? 'btn-dark' : 'btn-outline-dark'" class="btn btn-sm me-2" v-on:click="filter = 'PINNED'">
      <i class="fas fa-map-marked-alt"></i>
      釘選 @{{ mapAttractions.length }}
    </button>
    @endif
  </div>
  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div id="offcanvas__attractions-wrapper" class="p-3 p-sm-4 overflow-auto d-flex flex-row flex-md-column align-items-md-center">
  <p v-if="displayingAttractions.length === 0">快來看看有什麼吧～</p>
  <div v-else v-for="(attraction, i) in displayingAttractions" class="attraction-card card mb-0 mb-md-3 me-2 me-md-0 shadow flex-shrink-0">
    <div class="attraction-card__top position-relative shadow flex-shrink-0 bg-primary">
      <div class="position-absolute w-100 h-100">
        <div>
          <span v-for="tag in attraction.tags" class="badge d-block m-2" style="width: fit-content;" :style="{ 'background-color': tag.color }">@{{ tag.name }}</span>
          {{-- <span class="badge bg-primary d-block m-2" style="width: fit-content;">景點</span>
                <span class="badge bg-primary d-block m-2" style="width: fit-content;">生態</span> --}}
        </div>
        <div class="position-absolute end-0 bottom-0 m-2">
          <button type="button" :class="isFavorited(attraction.id) ? 'btn-secondary' : 'btn-outline-secondary'" class="btn btn-sm btn-floating" style="font-size: 0.8rem;" v-on:click="addToFavorite(attraction.id)">
            <i v-if="isFavorited(attraction.id)" class="fas fa-star"></i>
            <i v-else class="far fa-star"></i>
            {{-- <span class="d-none d-sm-inline">收藏</span> --}}
          </button>
          @if ($editMode)
          <button :id="'btn_pinToMap_' + i" type="button" :class="isPinned(attraction.id) ? 'btn-secondary' : 'btn-outline-secondary'" class="btn btn-sm btn-floating" style="font-size: 0.8rem;" v-on:click="pinToMap(attraction.id)">
            <i v-if="isPinned(attraction.id)" class="fas fa-map-marked-alt"></i>
            <i v-else class="fas fa-map"></i>
          </button>
          @endif
        </div>
      </div>
      <img v-if="attraction.images.length !== 0" :src="attraction.images[0].url" class="h-100 card-img-top img-fluid" style="object-fit: cover;" onerror="this.onerror=null; this.src='{{ asset('images/page/index/map.png') }}'" />
      <img v-else src="{{ asset('images/page/index/map.png') }}" class="h-100 card-img-top img-fluid" style="object-fit: cover;" />
    </div>
    <div class="attraction-card__bot card-body d-flex flex-column justify-content-between overflow-hidden">
      <h6 class="text-primary">@{{ attraction . name }}</h6>
      <p class="card-text overflow-hidden" style="font-size: 0.9rem;">@{{ attraction . description }}</p>
      <div class="d-flex">
        <button type="button" class="btn btn-secondary btn-sm me-2 w-100 guide" v-on:click="locateOnMap(attraction)">
          <i class="fas fa-fw fa-map-marker-alt"></i>
          <span class="d-none d-md-inline">地圖標示</span>
        </button>
        <button type="button" class="btn btn-outline-secondary btn-sm w-100" data-bs-toggle="modal" data-bs-target="#attraction-detail-modal" v-on:click="detailTarget = attraction">
          <i class="fas fa-fw fa-book-open"></i>
          <span class="d-none d-md-inline">詳細資訊</span>
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
  /* 後端變數 - 命名應該要統一用 $ 代表 Laravel 傳來的變數，但先不改QQ */
  const addressLatLng = @json($addressLatLng);
  const attractions = @json($attractions);
  const userFavorites = @json($userFavorites);
  const $map = @json($map);
  const mapAttractions = @json($mapAttractions);
  const $user = @json($user);
  const exploreMode = @json($exploreMode);
  const viewMode = @json($viewMode);
  const editMode = @json($editMode);

  window.addEventListener('load', () => {
    const myOffcanvas = new bootstrap.Offcanvas(document.getElementById('custom-offcanvas'));
    myOffcanvas.show();

    if (exploreMode) {
      introJs().setOptions({
        steps: [{
          element: document.querySelector('#info_exploreMode'),
          title: '探索模式',
          intro: '在探索模式中，你可以盡情地探索那些我們幫你蒐集好的有趣事物！<br /><br />有別於一般的地圖，我們的地圖也提供了那些短暫出現卻又精彩萬分的事物，現在就來看看如何與它們相遇！'
        },
        {
          element: document.querySelector('#btn_locateUser'),
          title: '定位自己',
          intro: '定位後會立即在你的周圍顯示那些有趣的地點。<br /><br />並且也可以拖曳自己的圖標重新定位！'
        },
        {
          element: document.querySelector('#btn_searchAttractions'),
          title: '搜尋區域',
          intro: '當然，你也可以搜尋你感興趣的某個區域。<3'
        },
        {
          element: document.querySelector('#offcanvas__attractions-wrapper'),
          title: '側邊欄',
          intro: '側邊欄收集了那些在地圖上位於你周圍的地點資訊，而此處的地點也會隨著你的位置變動而自動更新！<br /><br />當你透過搜尋按鈕進行搜尋時，側邊欄則會忽略你週遭的地點，取而代之的是會顯示你關注區域中的地點資訊。'
        },
        {
          element: document.querySelector('#btn_createMap'),
          title: '你的旅人地圖',
          intro: '當你在探索模式中想規劃下一次行程的路線時，按下這個按鈕可以建立屬於你自己的旅人地圖。<br /><br />在旅人地圖的介面中，你可以將感興趣的地點釘選至地圖裡，並與其它旅人分享這份屬於你的地圖！'
        }]
      }).start();
    } else {
      if (editMode) {
        introJs().setOptions({
          steps: [{
            element: document.querySelector('#info_editMode'),
            title: '編輯模式',
            intro: '這是一張由你建立的旅人地圖！<br /><br />在編輯模式裡，你可以像探索模式一樣瀏覽所有地點，並且透過釘選按鈕將地點加入你的地圖中。'
          },
          {
            element: document.querySelector('#btn_pinToMap_0'),
            title: '釘選按鈕',
            intro: '透過釘選按鈕，你可以將感興趣的地點釘選至你的個人地圖中。<br /><br />而透過這種方式釘選的地點會與該地圖綁定，這樣就可以規劃一張屬於你自己的地圖了！'
          },
          {
            element: document.querySelector('#btn_filtPinned'),
            title: '顯示釘選的地點',
            intro: '為了讓旅人們可以一眼看見自己的地圖裡有哪些地點被釘選了，我們也替你準備了這個按鈕！'
          },
          {
            title: '分享你的地圖',
            intro: '透過地圖建立起旅人們之間的聯繫是阿米狗的宗旨，而這也是我們稱之為旅人地圖的原因！<br /><br />希望你喜歡<3<br /><br /><i>Buen Camino</i>'
          }]
        }).start();
      } else {
        introJs().setOptions({
          steps: [{
            element: document.querySelector('#info_viewMode'),
            title: '檢視模式',
            intro: '這是一張由其它旅人建立的旅人地圖。<br /><br />在檢視模式裡，你沒辦法使用大部分的地圖功能，但是你可以看見此地圖釘選的地點資訊。'
          },
          {
            element: document.querySelector('#btn_export'),
            title: '匯出行程表',
            intro: '當然，你還是可以把這張地圖的地點匯出成行程表！'
          }]
        }).start();
      }

    }

  });

  //   let _map = '<?php if(isset($map)) { echo json_encode($map); } else { echo null; } ?>';
  //   console.log($$map, _map);
  //   $map = JSON.parse($map);
  //   console.log($map);

  //   if (addressLatLng) locateUser(addressLatLng)
  //   else locateUser({ lat: 22.627278, lng: 120.301435 }); // for test

  // 使用者 Marker 外觀
  const iconSize = [50, 50];
  const userIcon = L.icon({ iconUrl: "/images/page/maps/marker-user.png", iconSize });
  const viewIcon = L.icon({ iconUrl: "/images/page/maps/marker-view.svg", iconSize });
  const festivalIcon = L.icon({ iconUrl: "/images/page/maps/marker-festival.svg", iconSize });
  const artIcon = L.icon({ iconUrl: "/images/page/maps/marker-art.svg", iconSize });


  // 使用者 Marker 物件
  const userMarker = L.marker([0, 0], {
    opacity: 0,
    draggable: true,
    icon: userIcon,
    autoPan: true,
    autoPanPadding: [200, 200],
    autoPanSpeed: 25,
  });

  function setDefaultFilterMode() {
    if (exploreMode) return 'NOTHING';
    if (viewMode) return 'PINNED';
    if (editMode) return 'PINNED';
  }

  /* Vue */
  $vue = new Vue({
    el: '#app',
    data: {
      isLoading: false,
      markerClusters: null,
      markers: [],
      map: null,
      attractions: attractions || [],
      detailTarget: {},
      userFavorites: userFavorites || [],
      mapAttractions: mapAttractions || [],
      filter: setDefaultFilterMode(), // 'PINNED', 'FAVORITED'
      displayingAttractions: [],
    },
    mounted() {
      //   this.changeDisplayingAttractions(this.filter); // 20210702 可能不需要，暫時註解
      this.$refs.userMarker = userMarker;
      this.$refs.userMarker.addEventListener('moveend', this.onUserMarkerMoved);
      this.initLeaflet();
      this.updateAttractions({ attractions, userFavorites, mapAttractions });

      if (addressLatLng) this.locateUser(addressLatLng);
      else if (attractions[0]) this.map.flyTo({ lat: attractions[0].position.lat, lng: attractions[0].position.lng }, 7, { animate: false });

    },
    methods: {
      initDisplayingAttractions() {

      },
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
      updateAttractions({ attractions, userFavorites, mapAttractions }) {
        this.attractions = attractions;
        this.userFavorites = userFavorites;
        if (mapAttractions) this.mapAttractions = mapAttractions;
        this.changeDisplayingAttractions(this.filter);
        // console.log(this.displayingAttractions);
        this.renderMarkersOnMap(this.displayingAttractions);
      },
      locateOnMap(attraction) {
        const { lat, lng } = attraction.position;
        this.map.flyTo([lat, lng], 17, { animate: true, duration: 1.5 });
      },
      async addToFavorite(attractionId) {
        const { data } = await axios.patch(`/attractions/${attractionId}/favorite`);
        const { userFavorites } = data;
        this.userFavorites = userFavorites;
      },
      isFavorited(attractionId) {
        return this.userFavorites.map(uF => uF.id).includes(attractionId);
      },
      async pinToMap(attractionId) {
        const { data } = await axios.patch(`/maps/${$map.id}/pin`, { attractionId });
        const { mapAttractions } = data;
        this.mapAttractions = mapAttractions;
      },
      isPinned(attractionId) {
        return this.mapAttractions.map(mA => mA.id).includes(attractionId);
      },
      // 將 Markers 算繪至地圖上
      renderMarkersOnMap(attractions) {
        if (this.markerClusters) this.markerClusters.clearLayers();
        this.markerClusters = new L.MarkerClusterGroup().addTo(this.map);
        this.markers = attractions.map(a => L.marker([a.position.lat, a.position.lng], {
          icon: defineMarkerIcon(a.tags[0])
        }).bindPopup(`<b>${a.name}</b><br>${a.tel}<br>${a.position.address}`));
        this.markerClusters.addLayers(this.markers);


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
          vue.map.flyTo([lat, lng], 15, { animate: true, duration: 1.5 });
          userMarker.setLatLng([lat, lng]).setOpacity(1).addTo(vue.map);
          vue.onUserMarkerMoved({ lat, lng });
        }
      },
      async onUserMarkerMoved({ lat, lng }) {
        if (event) params = { lat, lng } = this.$refs.userMarker.getLatLng();
        else params = { lat, lng }
        this.isLoading = true;
        const response = await axios.get('/api/attractions', { params });
        this.isLoading = false;
        this.filter = 'NOTHING';
        this.updateAttractions(response.data);
      },
      changeDisplayingAttractions(filter) {
        switch (filter) {
          case 'NOTHING':
            this.displayingAttractions = this.attractions;
            break;
          case 'PINNED':
            this.displayingAttractions = this.mapAttractions;
            break;
          case 'FAVORITED':
            this.displayingAttractions = this.userFavorites;
            break;
          default:
            this.displayingAttractions = [];
            break;
        }
      }
    },
    watch: {
      filter: function(next, prev) {
        this.changeDisplayingAttractions(next)
      }
    }
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
<script>
  window.onload = () => {
    const customOffcanvas = document.getElementById('custom-offcanvas');
    customOffcanvas.addEventListener('show.bs.offcanvas', () => {
      document.querySelector(":root").style.setProperty("--offcanvas-width", "400px");
    });
    customOffcanvas.addEventListener('hide.bs.offcanvas', () => {
      document.querySelector(":root").style.setProperty("--offcanvas-width", "0px");
    });
  }
</script>
@endsection

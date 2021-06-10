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
          <i class="fas fa-search"></i>
        </a>
    </div>
          <div class="attraction-card__top position-relative shadow flex-shrink-0">
            <div class="position-absolute w-100 h-100">
              <div>
                <span class="badge bg-primary d-block m-2" style="width: fit-content;">景點</span>
                <span class="badge bg-primary d-block m-2" style="width: fit-content;">生態</span>
              </div>
              <button type="button" class="btn btn-primary btn-sm position-absolute end-0 bottom-0 m-2"
                <i class="far fa-star"></i>
                <span class="d-none d-sm-inline">收藏</span>
              </button>
            </div>
          </div>
          <div class="attraction-card__bot card-body d-flex flex-column justify-content-between overflow-hidden">
            <div class="d-flex">
              <button type="button" class="btn btn-primary btn-sm me-2 w-100 guide">
                <i class="fas fa-fw fa-map-marker-alt"></i>
                <span class="d-none d-sm-inline">地圖標示</span>
              </button>
              <button type="button" class="btn btn-outline-primary btn-sm w-100" data-bs-toggle="modal"
                <i class="fas fa-fw fa-book-open"></i>
                <span class="d-none d-sm-inline">詳細資訊</span>
              </button>
            </div>
          </div>
        </div>
    </div>
  </div>


@endsection

@section('js')
  <script src="{{ asset('js/leaflet.js') }}"></script>

  <script>
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: 'pk.eyJ1IjoiZGFoaXNjIiwiYSI6ImNrOTVmZ24xNzBiM2wzZXAycnNxYTJoemgifQ.y51LxBKtrU9iu_Z8O8sSEQ'
    }).addTo(map);

    const userIcon = L.icon({
      iconUrl: "./images/lovelyicon.png",
      iconSize: [50, 50],
    });

    const userMarker = L.marker([0, 0], {
      opacity: 0,
      draggable: true,
      icon: userIcon,
    });


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
        };

        const locateFailedHandler = () => {
          alert('定位失敗。');
        };

        navigator.geolocation.getCurrentPosition(locateSuccessHandler, locateFailedHandler, options);
      } else {
        alert("抱歉！瀏覽器不支援 Geolocation");
      }
    }

    btn_locateSelf.addEventListener('click', locateUser);


    const attractions = {!! json_encode($attractions->toArray()) !!};
    /* Basic Settings */
    // 縮放功能放左下角

    var object = {!! json_encode($attractions->toArray()) !!};
    var markers = new L.MarkerClusterGroup().addTo(map);
    var data = [];
    object.forEach(function (objectData , objectIndex) {
      data.push({
        "Name": objectData.name,
        "Px": objectData.position.px,
        "Py": objectData.position.py,
        "Tel": objectData.tel,
        "Add": objectData.position.address
      })

      markers.addLayer(L.marker([data[objectIndex].Py, data[objectIndex].Px], {
        icon: customIcon
      }).bindPopup(`<b>${data[objectIndex].Name}</b><br>${data[objectIndex].Tel}<br>${data[objectIndex].Add}`));
    })
    const guideToBtn = document.querySelectorAll('.guide');
    guideToBtn.forEach(function(value, index) {
          value.setAttribute('data-index', index);
          value.addEventListener('click', function() {
            var dataindex = this.getAttribute("data-index");
            mymap.flyTo([data[dataindex].Py, data[dataindex].Px], 15, {
              animate: true,
              duration: 2
            });
          })
        })

  </script>
@endsection

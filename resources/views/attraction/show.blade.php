<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>@section('title') {{ config('app.name', 'Amigo') }} | @show</title>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
      <link rel="stylesheet" href="{{ asset('css/amigo.css') }}">
      @yield('css')
      <style>


      </style>

</head>
<body>
      {{-- @section('nav') --}}
      @include('partials.navbar')
      @show
      @yield('content')
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
      @yield('js')
      @include('partials.bootstrap.toast')


<div class="container py-5 " style="min-width:576px">
      <div class="row">
            <div class="d-flex flex-column justify-content-center px-5 border border-primary" style="object-fit: cover">
                  <img src="https://cdn.pixabay.com/photo/2014/12/21/09/33/map-574792_960_720.jpg" class="h-3 mb-3 card-img-top img-fluid" />
                        <div class="px-5">
                              <div class="w-100 mb-1">
                                    <span class="bg-secondary badge">親子</span>
                                    <span class="bg-secondary badge">自然</span>
                                    <span class="bg-secondary badge">國家公園</span>
                              </div>
                              <div class="col-12 text-secondary text-dark">
                                    <h2 class="a-fs-1 mb-1 text-start lh-base border-bottom border-secondary d-flex justify-content-between">秀姑巒溪遊客中心
                                          <div>
                                                <i class="fab fa-facebook text-secondary a-fs-6 me-1 text-end"></i>
                                                <i class="fas fa-star     text-secondary a-fs-6 me-1 text-end"></i>
                                          </div>
                                    </h2>
                                    
                                    <div class="mb-1 text-dark border-bottom border-secondary py-1">
                                          <i class="fas fa-map-marker-alt a-fs-6 "> 978花蓮縣瑞穗鄉中山路三段215號</i>
                                          <i class="fas fa-phone a-fs-6"> 886-3-8875400</i>
                                    </div>  
                                          <p>秀姑巒溪遊客中心位於花東縱谷瑞穗大橋旁，是秀姑巒溪泛舟活動的起點，遊客中心建築外觀仿自原住民傳統建築，中心前廣場還有一巨大的原住民雕像，造型相當別緻；影片播放室播放泛舟安全影片，遊客中心並設有露營區，每逢泛舟季節，遊客如織。</p>
                              </div>
                        </div>
            </div>
      </div>
</div>


      {{-- @include('partials.backstage.footer') --}}
</body>

</html>

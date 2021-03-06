<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="阿米狗是每個人的旅人地圖，記錄著那些短暫出現卻又精彩萬分的事物。">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="{{ asset('images/Logo_2.svg') }}" type="image/x-icon" />
  <title>{{ config('app.name', 'Amigo') }} | @section('title')@show</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/amigo.css') }}">
  @yield('css')
  {{-- <style>
    body {
      padding-top: 55px;
    }
  </style> --}}
</head>

<body id="to-top">
  @section('nav')
  @include('partials.navbar')
  @show
  @yield('content')
  @section('footer')
  @include('partials.footer')
  @show
  <script src="{{ asset(mix('js/app.js')) }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  @yield('js')
  @include('partials.bootstrap.toast')
</body>

</html>

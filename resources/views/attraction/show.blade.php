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

<div></div>
<div class="container py-5">
      <div class="col-10">
            <div class="card mb-4 d-flex flex-column flex-md-row">
                  {{-- <div class="ratio ratio-1x1 w-100 bg-light" >
                        <div class="a-background rounded-start"></div>
                  </div> --}}
                  <div class="card-body ratio ratio-4x3 bg-light">我是一隻魚</div>
            </div>
      </div>
</div>


      {{-- @include('partials.backstage.footer') --}}
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name', 'Amigo') }} 後台 | @yield('title')</title>
  {{-- Bootstrap 5 CSS --}}
  <link rel="stylesheet" href="{{ asset('css/amigo.css') }}">
  <link rel="stylesheet" href="{{ asset('css/backstage.css') }}" />
  {{-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" /> --}}
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <style>
    .pagination {
    justify-content: flex-end
  }
  </style>
  @yield('css')
</head>

<body>
  <!-- Page Wrapper -->
  <div id="wrapper">
    @include('partials.backstage.sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        @include('partials.backstage.topbar')
        @yield('page-content')
      </div>
      @include('partials.backstage.footer')
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/backstage.min.js') }}"></script>
  <script src="{{ asset('js/twCitySelector.js') }}"></script>
  @yield('js')
</body>

</html>

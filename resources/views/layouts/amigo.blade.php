<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@section('title') {{ config('app.name', 'Amigo') }} | @show</title>
  {{-- Custom CSS & Bootstrap theme --}}
  <link rel="stylesheet" href="{{ asset('css/amigo.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
  {{-- Font Awesome 5 CSS --}}
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  @yield('css')
</head>

<body>
  @section('nav')
    @include('partials.navbar')
  @show
  @yield('content')
  <script src="{{ asset('js/app.js') }}"></script>
  {{-- Bootstrap 5 JavaScript bundle --}}
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  @yield('js')
</body>

</html>

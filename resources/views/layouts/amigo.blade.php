<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name', 'Amigo') }} | @yield('title')</title>
  {{-- Bootstrap 5 CSS --}}
  <link rel="stylesheet" href="{{ asset('css/amigo.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
  @yield('css')
</head>

<body>
  @include('partials.navbar')
  @yield('content')
  <script src="{{ asset('js/app.js') }}"></script>
  {{-- Bootstrap 5 JavaScript bundle --}}
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  @yield('js')
</body>

</html>

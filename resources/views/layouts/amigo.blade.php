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

<body data-spy="scroll" data-target="#list-example" data-offset="0" class="position-relative">
  @section('nav')
  @include('partials.navbar')
  @show
  @yield('content')
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  @yield('js')
</body>

</html>

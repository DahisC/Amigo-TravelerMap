<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Amigo - @yield('title')</title>
  <link rel="stylesheet" href="css/custom.css">
  @yield('css')
</head>

<body>
  @yield('content')
  <script src="js/app.js"></script>
  {{-- 比起在 app.js 中引入 bootstrap 後再壓縮，這種直接引入的方式大概會是 +300kb 與 +70kb 的差別！ --}}
  <script src="js/bootstrap.bundle.min.js"></script>
  @yield('js')
</body>

</html>

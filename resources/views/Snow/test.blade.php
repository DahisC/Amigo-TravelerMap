<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    .carousel-item {
      width: 100%;
      height: 650px;
      display: flex;
      position: relative;
      background-attachment: fixed;
    }

    .carousel-item img {
      width: 100%;
      background-position: center;
      background-size: cover;
    }

    .logo {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background-color: blue;
      position: absolute;
      left: 50%;
      top: 10%;
      transform: translateX(-50%);
    }

    .button {
      width: 300px;
      margin: 0 auto;
      position: absolute;
      left: 50%;
      top: 35%;
      transform: translateX(-50%);
      display: flex;
      justify-content: space-between;
    }

    .icon {
      width: 500px;
      position: absolute;
      left: 75%;
      top: 5%;
    }

    .icon img {
      width: 30px;
      margin-right: 20px;
    }

    .icon img:hover {
      border: 2px solid rgb(0, 183, 255);
    }

    .story .col img {
      width: 100px;
      height: 200px;
    }

  </style>
</head>

<body>
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('./image/sea.jpg') }}">
        <div class="logo"></div>
        <div class="button">
          <a href="">前往地圖</a>
          <a href="">前往地圖</a>
          <a href="">前往地圖</a>
        </div>
        <div class="icon">
          <img src="{{ asset('./image/human.png') }}" alt="" class="human" style="width: 40px">
          <img src="{{ asset('./image/facebook-logo.png') }}" alt="">
          <img src="{{ asset('./image/line-logo.png') }}" alt="">
        </div>
      </div>
    </div>
  </div>
  <div class="container story">
    <div class="row">
      <div class="col">
        <img src="{{ asset('./image/luggage.jpg') }}" alt="">
      </div>
      <div class="col">
        地圖文案
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
    integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
  </script>
</body>

</html>

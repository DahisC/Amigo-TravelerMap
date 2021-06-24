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

  <div class="container py-5" style="min-width:576px">
    <div class="row py-5">
      <div class="col py-5">
        <div class="card mb-3">
          <!-- Carousel wrapper -->
          <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
              <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <!-- Inner -->
            <div class="carousel-inner">
              <!-- Single item -->
              <div class="carousel-item active">
                <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(15).jpg" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
              </div>

              <!-- Single item -->
              <div class="carousel-item">
                <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(22).jpg" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </div>

              <!-- Single item -->
              <div class="carousel-item">
                <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(23).jpg" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
              </div>
            </div>
            <!-- Inner -->

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <!-- Carousel wrapper -->
          {{-- <img src="https://mdbootstrap.com/img/new/slides/041.jpg" class="card-img-top" alt="..." /> --}}
          <div class="card-body">
            <h5 class="card-title">{{ $attraction->name }}</h5>
            <p class="card-text">
              @foreach ($attraction->tags as $tag)
              <span class="badge d-block me-2" style="width: fit-content; background-color: {{ $tag->color }}">{{ $tag->name }}</span>
              @endforeach
            </p>
            <p class="card-text">
              {{ $attraction->description }}
            </p>
            <div class="card-text">
              <div>
                <i class="fas fa-fw fa-map-marker-alt me-2"></i>{{ $attraction->position->country }}, {{ $attraction->position->address }}
              </div>
              <div>
                <i class="fas fa-fw fa-phone me-2"></i>{{ $attraction->position->country }}, {{ $attraction->position->address }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  {{-- @include('partials.backstage.footer') --}}
</body>

</html>

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
    .accordion-button:not(.collapsed){
      color: white;
    }

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
              @foreach ( $attraction->images as $image)
                <!-- Single item -->
                <div class="carousel-item">
                  <img src="{{asset($image->url)}}" class="d-block w-100" alt="..." />
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>{{ $attraction->image->image_desc ?? ''}}</p>
                  </div>
                </div>
              @endforeach
            </div> 

              <!-- Single item -->
              {{-- <div class="carousel-item">
                <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(23).jpg" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
              </div>--}}
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
          <div class="card-body">
            <a class="card-title h5 text-dark" href="{{ $attraction->website }}">{{ $attraction->name }}</a>
            
            <p class="card-text">
              @foreach ($attraction->tags as $tag)
              <span class="badge d-block me-2" style="width: fit-content; background-color: {{ $tag->color }}">{{ $tag->name }}</span>
              @endforeach
            </p>

              {{-- collapse --}}
            <div class="col d-block d-md-flex">
              <div class="accordion col-12 col-md-6 p-1" id="accordionFlushExample">
                <div class="rounded-2 ">
                  <h2 class=" accordion-header" id="flush-headingOne">
                    <button
                      class="rounded-2 accordion-button collapsed bg-secondary"
                      type="button"
                      data-mdb-toggle="collapse"
                      data-mdb-target="#flush-collapseOne"
                      aria-expanded="false"
                      aria-controls="flush-collapseOne">
                      聯絡資訊
                    </button>
                  </h2>
                  
                  <div
                    id="flush-collapseOne"
                    class="accordion-collapse collapse"
                    aria-labelledby="flush-headingOne"
                    data-mdb-parent="#accordionFlushExample"
                  >
                    <div class="accordion-body">
                      @if ($attraction->traffic_info)
                      <i class="fas fa-fw fa-map-marker-alt me-2"></i>{{ $attraction->position->country }}, {{ $attraction->position->address }}
                      @endif
                      @if ($attraction->traffic_info)
                      <div><i class="fas fa-fw fa-phone me-2"></i>{{ $attraction->tel }}</div>
                      @endif
                      
                    </div>
                  </div>
                </div>

              </div>
              <div class="accordion col-12 col-md-6 p-1" id="accordionFlushExample">
                <div class="rounded-2 ">
                  <h2 class=" accordion-header" id="flush-headingTwo">
                    <button
                      class="rounded-2 accordion-button collapsed bg-secondary"
                      type="button"
                      data-mdb-toggle="collapse"
                      data-mdb-target="#flush-collapseTwo"
                      aria-expanded="false"
                      aria-controls="flush-collapseTwo">
                      交通資訊
                    </button>
                  </h2>
                  
                  <div
                    id="flush-collapseTwo"
                    class="accordion-collapse collapse"
                    aria-labelledby="flush-headingTwo"
                    data-mdb-parent="#accordionFlushExample"
                  >
                    <div class="accordion-body">
                      @if ($attraction->traffic_info)
                        <div><i class="fas fa-fw fa-subway me-2"></i>{{ $attraction->traffic_info }}</div>
                      @endif
                      @if ($attraction->parking_info)
                        <div><i class="fas fa-fw fa-parking me-2"></i>{{ $attraction->parking_info }}</div>
                      @endif
                      {{-- <div><i class="fas fa-fw fa-subway me-2"></i>{{ $attraction->traffic_info }}</div>
                      <div><i class="fas fa-fw fa-parking me-2"></i>{{ $attraction->parking_info }}</div> --}}
                    </div>
                  </div>
                </div>
                
              </div>
            </div>

            <p class="card-text">
              {{ $attraction->description }}
            </p>
            <div class="card-text">
              <div>
                <div><i class="fas fa-fw fa-ticket-alt me-2"></i>{{ $attraction->ticket_info }}</div>

              </div>
                
              
               
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
<script>


var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-mdb-toggle="tooltip"]')) 
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {   
  return new bootstrap.Tooltip(tooltipTriggerEl) })
</script>

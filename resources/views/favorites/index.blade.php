@extends('layouts.amigo')

@section('css')
<style>
  .description {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    /* number of lines to show */
    -webkit-box-orient: vertical;

  }

  .pagination {
    justify-content: center;
  }
</style>
@endsection

@section('content')
<div class="container py-5">
  <div class="row py-5">
    <div class="col">
      <h1 class="text-primary a-fs-3">我的收藏</h1>
      <hr />
    </div>
  </div>
  <div class="row">
    <div class="d-none d-md-block col-4">
      <div class="input-group row-sm-4 position-sticky" style="top: 0px;">

        <form action="/favorites" method="get">
          <div class="form-outline">
            <input type="search" id="form1" class="form-control" name="search" />
            <label class="form-label" for="form1">Search</label>
          </div>

          <button type="Submit" class="btn btn-primary" id="inputButton">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>

      <div class="list-group position-sticky" style="top: 0px;">
        <label class="list-group-item">
          <input class="form-check-input me-1" type="checkbox" value="" />
          Cras justo odio
        </label>
        <label class="list-group-item">
          <input class="form-check-input me-1" type="checkbox" value="" />
          Dapibus ac facilisis in
        </label>
        <label class="list-group-item">
          <input class="form-check-input me-1" type="checkbox" value="" />
          Morbi leo risus
        </label>
        <label class="list-group-item">
          <input class="form-check-input me-1" type="checkbox" value="" />
          Porta ac consectetur ac
        </label>
        <label class="list-group-item">
          <input class="form-check-input me-1" type="checkbox" value="" />
          Vestibulum at eros
        </label>
      </div>
    </div>
    <div class="col">
      <div class="row">
        @foreach ($userFavorites as $f)
        <div class="col-12">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset($f->images[0]->url ?? '') }}" alt="{{ $f->images[0]->image_desc ?? '' }}" class="w-100 h-100" style="object-fit: cover;" />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-start mb-2">
                    <h5 class="card-title text-primary">
                      <a href="{{ route('attractions.show', ['attraction' => $f->id]) }}">{{ $f->name }}</a>
                      {{-- @if (!empty($f->website))
                      <a href="{{$f->website}}" target="_blank">
                      {{ $f->name }}
                      <small><i class="fas fa-external-link-alt"></i></small>
                      </a>
                      @else
                      {{ $f->name }}
                      @endif --}}
                    </h5>
                    <div class="d-flex">
                      @include('partials.btn-social-share')
                      @include('partials.favorites.btn-pin-to-map')
                    </div>
                  </div>
                  <p class="card-text">
                    @if (isset($f->time))
                    <div>
                      <small class="d-flex">
                        <span><i class="fas fa-fw fa-calendar me-1"></i></span>
                        <span>{{$f->time->startDate ?? ''}} ~ {{$f->time->endDate ?? ''}}</span>
                      </small>
                    </div>
                    @endif
                    <div>
                      <small class="d-flex">
                        <span><i class="fas fa-fw fa-map-marker me-1"></i></span>
                        <span>{{$f->position->country ?? ''}}, {{$f->position->address ?? ''}}</span>
                      </small>
                    </div>
                  </p>
                  <p class="card-text description" title="{{ $f->description }}">
                    @if (!empty($f->description))
                    {{$f->description}}
                    @else
                    <i>暫無相關描述</i>
                    @endif
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  {{-- Pagination --}}
  <hr />
  {{-- <div class="row">
    <div class="col">
      {{ $userFavorites->links() }}
</div>
</div> --}}
</div>
@endsection

@section('js')
{{-- <script>
  document.querySelector('#inputButton').addEventListener('click',function(){
        const text = document.querySelector('#form1').value;
        axios.get('/favorites',{params: {
          search:  text ,
        }})
.then((res)=>console.log(res))
});
</script> --}}


{{-- <script>
  const selectElementAll = document.querySelectorAll('.selectMap');
  selectElementAll.forEach((selectElement) => {
    selectElement.addEventListener('change', (e) => {
      const mapId = e.target.value;
      const attractionId = e.target.parentNode.parentNode.dataset.id;
      axios.patch(`/maps/${mapId}/pin`, { attractionId });
    });
  });
</script> --}}
@stack('stack-js')
@endsection

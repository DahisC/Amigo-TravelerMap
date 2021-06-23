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
  <div class="row">
    <div class="col">
      <h1 class="text-primary a-fs-3">我的收藏</h1>
      <hr />
    </div>
  </div>
  <div class="row">
    <div class="d-none d-md-block col-3">
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
          <div class="card mb-4 d-flex flex-column flex-md-row">
            <div class="ratio ratio-1x1" style="width: 250px;">
              <div class="a-background rounded-start" style="background-image: url({{ $f->images[0]->url ?? '' }}); background-size: cover;"></div>
            </div>
            <div class="card-body">
              123
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  {{-- Pagination --}}
  {{-- <hr />
  <div class=" row">
    <div class="col">
      {{ $userFavorites->links() }}
</div>
</div> --}}
@endsection

@section('js')
@stack('stack-js')
@endsection

{{-- <div class="col-12">
          <div class="card mb-3 text-dark">
            <div class="row g-0">
              <div class="col-3">
                <div class="ratio ratio-1x1 a-background" style="background-image: url({{ $f->images[0]->url }}); background-size: cover;">
@if (!empty($f->images[0]))
<!-- <img src={{$f->images[0]->url}} alt="{{ $f->images[0]->image_desc ?? '' }}" class="img-fluid rounded" height="200" /> -->
@else
<!-- <img src="https://mdbootstrap.com/wp-content/uploads/2020/06/vertical.jpg" alt="..." class="img-fluid rounded" height="200" /> -->
@endif
</div>
</div>
<div class="col">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-2">
      <h5 class="card-title mb-0 text-primary">
        {{ $f->name }}
      </h5>
      <div>
        @include('partials.btn-social-share')
        @include('partials.favorites.btn-add-to-map')
      </div>
    </div>
    @if (isset($f->time))
    <p class="card-text">
      <small class="text-muted">
        <i class="fas fa-fw fa-calendar-day"></i>
        日期 {{$f->time->startDate ?? ''}} ~ {{$f->time->endDate ?? ''}}
      </small>
    </p>
    @endif
    <p class="card-text">
      <small class="text-muted">
        <i class="fas fa-fw fa-university"></i>
        官網 <a href="{{$f->website}}">{{$f->name}}</a>
      </small>
    </p>
    <p class="card-text">
      <small class="text-muted">
        <i class="fas fa-fw fa-map-marker-alt"></i>
        地址 {{ $f->position->address}}
      </small>
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
</div> --}}

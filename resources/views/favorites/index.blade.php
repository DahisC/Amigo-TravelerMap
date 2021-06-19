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
          <div class="card mb-3 bg-primary text-dark">
            <div class="row g-0">
              <div class="col-md-4">
                <div class=" ratio ratio-1x1">
                  <img src="https://mdbootstrap.com/wp-content/uploads/2020/06/vertical.jpg" alt="..." class="img-fluid rounded" height="200" />
                </div>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="card-title mb-0">
                      {{ $f->name }}
                    </h5>
                    <div>
                      {{-- <a class="btn btn-outline-primary btn-sm" href="#" role="button">
                            <i class="fas fa-share"></i>
                            分享
                          </a> --}}
                      @include('partials.btn-social-share')
                      @include('partials.favorites.btn-add-to-map')
                    </div>
                  </div>
                  <p class="card-text">
                    <small class="text-muted">
                      <i class="fas fa-fw fa-map-marker-alt"></i>
                      臺東縣951綠島鄉環島公路6公里處
                    </small>
                  </p>
                  <p class="card-text description">
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
  <div class="row">
    <div class="col">
      <nav aria-label="...">
        <ul class="pagination pagination-circle justify-content-end">
          <li class="page-item">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">上一頁</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2 <span class="visually-hidden">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">下一頁</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>
@endsection

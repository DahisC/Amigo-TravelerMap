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
        <div class="form-outline">
          <input type="search" id="form1" class="form-control" name="search" />
          <label class="form-label" for="form1">Search</label>
        </div>

        <button class="btn btn-primary" id="inputButton" onclick="query()">
          <i class="fas fa-search"></i>
        </button>
      </div>
      <div class="list-group position-sticky search-group" style="top: 0px;">
        <label class="list-group-item">
          <input class="form-check-input me-1" type="checkbox" value="1" />
          景點
        </label>
        <label class="list-group-item">
          <input class="form-check-input me-1" type="checkbox" value="2" />
          藝術
        </label>
        <label class="list-group-item">
          <input class="form-check-input me-1" type="checkbox" value="3" />
          節慶
        </label>
      </div>
    </div>
    <div class="col">
      <div class="row">
        @foreach ($userFavorites as $f)
        <div class="col-12">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4 a-background bg-primary">
                <img src="{{ asset($f->images[0]->url ?? '') }}" alt="{{ $f->images[0]->image_desc ?? '' }}" class="w-100 h-100" style="object-fit: contain;" onerror="this.onerror=null; this.src='{{ asset('images/page/index/map.png') }}'" />
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
<script>
  document.querySelector('.search-group').addEventListener('change', ({ target }) => {
    axiosFun('tag', target.value);
  });

  async function query() {
    const text = document.querySelector('#form1').value;
    await axiosFun('search', text);
  }

  // 這邊 search log出來會有tag search 但params的key吃不到 求解
  function axiosFun(search, input) {
   return  axios.get('/favorites', {
        params: {
          search : input,
        }
      })
      .then((res) => console.log(res))
  }
</script>
@stack('stack-js')
@endsection
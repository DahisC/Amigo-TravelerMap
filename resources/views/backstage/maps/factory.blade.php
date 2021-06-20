@extends('layouts.backstage')

@section('page-content')
<div class="container-fluid">

  <!-- Page Heading -->
  {{-- <h1 class="h3 mb-2 text-gray-800">地點 | 編輯</h1> --}}

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      {{-- <h6 class="m-0 font-weight-bold text-primary">Method -> UPDATE | Action -> {{ route('attractions.update', ['attraction' => $attraction->id]) }}</h6> --}}
      <h6 class="m-0 font-weight-bold text-primary mb-3">個人地點 | 新增</h6>
      <div>
        @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </div>
    </div>

    <div class="card-body">
      <form action="{{ isset($map) ? route('maps.update', ['map' => $map->id]) : route('maps.store') }}" method="POST">
        @csrf
        @if (isset($map))
        @method('PUT')
        @endif
        {{-- --}}
        <p class="text-primary">資訊 Info</p>
        <div class="mb-3">
          <label for="name" class="form-label">名稱 Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $map->name ?? old('name') }}" />
        </div>
        {{-- --}}
        <button class="btn btn-outline-primary btn-block">建立個人地圖</button>
      </form>
    </div>
  </div>
</div>
@endsection

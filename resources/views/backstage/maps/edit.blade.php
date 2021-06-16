@extends('layouts.backstage')

@section('page-content')
  <div class="container-fluid">

    <!-- Page Heading -->
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">收藏地點 | 編輯</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('backstage.maps.update', ['map' => $map->id]) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <p class="text-primary">資訊 Info</p>
          <div class="mb-3">
            <label for="name" class="form-label">名稱 Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $map->name }}" />
          </div>
          <button class="btn btn-outline-primary btn-block">完成</button>
        </form>
      </div>
    </div>
  </div>
@endsection











{{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}">
<form method="POST" action="{{ route('backstage.maps.update',['map'=>$map->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('backstage.maps.form')
    <button type="submit" class="btn btn-primary btn-block">送出</button>
</form>
<script src="{{ asset('css/app.css') }}"></script> --}}

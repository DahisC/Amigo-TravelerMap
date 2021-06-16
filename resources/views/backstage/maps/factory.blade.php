{{-- 此頁面同時是 Maps 的新增與編輯 --}}
@extends('layouts.backstage')  

@section('page-content')
<div class="container-fluid">

  <!-- Page Heading -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">收藏地點 | {{ isset($map) ? "編輯" : "新增" }}</h6>
    </div>

      <form action="{{ isset($map) ? route('backstage.maps.update', ['map' => $map->id]) : route('backstage.maps.store') }}" method="POST">
        @csrf
        @if (isset($map))
        @method('PUT')
        @endif       

    <p class="text-primary">資訊 Info</p>
    <div class="mb-3">
      <label for="name" class="form-label">名稱 Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $map->name ?? '' }}" />
    </div>
    
    <button class="btn btn-outline-primary btn-block">完成</button>
    </form>
  </div>
</div>
</div>
@endsection
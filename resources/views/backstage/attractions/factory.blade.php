@extends('layouts.backstage')

@section('page-content')
<div class="container-fluid">

  <!-- Page Heading -->
  {{-- <h1 class="h3 mb-2 text-gray-800">地點 | 編輯</h1> --}}

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      {{-- <h6 class="m-0 font-weight-bold text-primary">Method -> UPDATE | Action -> {{ route('attractions.update', ['attraction' => $attraction->id]) }}</h6> --}}
      <h6 class="m-0 font-weight-bold text-primary">地點 | 編輯</h6>
    </div>
    <div class="card-body">
      <form action="">
        <p class="text-primary">圖片 Image</p>
        <div id="div_uploaded_images" class="row">
        </div>
        <div class="text-center">
          <a id="btn_upload_image" href="#" class="btn btn-link">
            新增圖片
            <i class="fa fa-plus"></i>
          </a>
        </div>

        <hr />
        {{-- --}}
        <p class="text-primary">資訊 Info</p>
        <div class="mb-3">
          <label for="name" class="form-label">名稱 Name</label>
          <input type="text" class="form-control" id="name" value="{{ $attraction->name }}" />
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">簡介 Description</label>
          <textarea class="form-control" id="description" rows="3">{{ $attraction->description }}</textarea>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="website" class="form-label">官方網站 Website</label>
            <input type="text" class="form-control" id="website" value="{{ $attraction->website }}" />
          </div>
          <div class="col">
            <label for="tel" class="form-label">聯絡電話 Tel</label>
            <input type="text" class="form-control" id="tel" value="{{ $attraction->tel }}" />
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="name" class="form-label">售票資訊 Ticket Info</label>
            <input type="text" class="form-control" id="name" value="{{ $attraction->ticket_info }}" />
          </div>
          <div class="col">
            <label for="name" class="form-label">交通資訊 Traffic Info</label>
            <input type="text" class="form-control" id="name" value="{{ $attraction->traffic_info }}" />
          </div>
          <div class="col">
            <label for="name" class="form-label">停車資訊 Parking Info</label>
            <input type="text" class="form-control" id="name" value="{{ $attraction->parking_info }}" />
          </div>
        </div>
        {{-- --}}
        <hr />
        <p class="text-primary">位置 Attraction position</p>
        <div id="city-county-selector" class="row mb-3">
          <div class="col">
            <label for="select_city" class="form-label">縣市 Region</label>
            <select class="form-control" id="select_city"></select>
          </div>
          <div class="col">
            <label for="select_area" class="form-label">城市 Town</label>
            <select class="form-control" id="select_area"></select>
          </div>
        </div>
        <label for="address" class="form-label">地址 Address</label>
        <input class="form-control" id="address" />
        {{-- --}}
        <hr />
      </form>
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
  initTWCitySelector();
</script>
<script>
  let uplodedImageCounter = 0;
  btn_upload_image.addEventListener('click', () => {
    event.preventDefault();
    const div_col = document.createElement('div');
    div_col.classList.add('col-12');
    div_col.classList.add('col-sm-6');
    div_col.classList.add('col-md-4');
    div_col.classList.add('mb-3');
    const input_uploadImage = document.createElement('input');
    input_uploadImage.classList.add('form-control-file');
    input_uploadImage.classList.add('mb-1');
    input_uploadImage.setAttribute('type', 'file');
    input_uploadImage.setAttribute('name', `images[${uplodedImageCounter}]`);
    input_uploadImage.dataset.index = uplodedImageCounter;
    const input_imageDesc = document.createElement('input');
    input_imageDesc.classList.add('form-control');
    input_imageDesc.classList.add('form-control-sm');
    const div_previewImage = document.createElement('div');
    div_previewImage.id = `div_previewImage_${uplodedImageCounter}`;

    div_col.appendChild(div_previewImage);
    div_col.appendChild(input_uploadImage);
    div_col.appendChild(input_imageDesc);
    div_uploaded_images.prepend(div_col);
    uplodedImageCounter++;
  });

  div_uploaded_images.addEventListener('change', (e) => {
    console.log(e.target.dataset.index);
    const div_preview_image = document.getElementById(`div_previewImage_${e.target.dataset.index}`);
    const file = e.target.files[0];
    const previewImage = document.createElement('img');
    previewImage.src = window.URL.createObjectURL(file);
    previewImage.classList.add('img-fluid');
    previewImage.classList.add('mb-1');
    div_preview_image.append(previewImage);
  });
</script>
@endsection

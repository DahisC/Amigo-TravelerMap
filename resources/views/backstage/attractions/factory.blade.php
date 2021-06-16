@extends('layouts.backstage')

@section('page-content')
<div class="container-fluid">

  <!-- Page Heading -->
  {{-- <h1 class="h3 mb-2 text-gray-800">地點 | 編輯</h1> --}}

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      {{-- <h6 class="m-0 font-weight-bold text-primary">Method -> UPDATE | Action -> {{ route('attractions.update', ['attraction' => $attraction->id]) }}
      </h6> --}}
      <h6 class="m-0 font-weight-bold text-primary">地點 | 編輯</h6>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <div class="card-body">
      <form
        action="{{ isset($attraction) ? route('attractions.update', ['attraction' => $attraction->id]) : route('attractions.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($attraction))
        @method('PUT')
        @endif
        {{-- --}}
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
        <p class="text-primary">標籤 Tags</p>
        <div class="row">
          @for ($i = 0; $i < 3; $i++) <div class="col">
            <select class="form-control" name="tags[{{ $i }}]">
              <option selected value="">未選擇</option>
              @foreach ($tags as $tag)
              <option value="{{ $tag->id }}">{{ $tag->name }}</option>
              @endforeach
            </select>
        </div>
        @endfor
    </div>
    <hr />
    {{-- --}}
    <p class="text-primary">資訊 Info</p>
    <div class="mb-3">
      <label for="name" class="form-label">名稱 Name</label>
      <input type="text" class="form-control" id="name" value="{{ $attraction->name ?? '' }}" />
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">簡介 Description</label>
      <textarea class="form-control" id="description" rows="3">{{ $attraction->description ?? '' }}</textarea>
    </div>
    <div class="row mb-3">
      <div class="col">
        <label for="website" class="form-label">官方網站 Website</label>
        <input type="text" class="form-control" id="website" value="{{ $attraction->website ?? '' }}" />
      </div>
      <div class="col">
        <label for="tel" class="form-label">聯絡電話 Tel</label>
        <input type="text" class="form-control" id="tel" value="{{ $attraction->tel ?? '' }}" />
      </div>
    </div>
    <div class="row mb-3">
      <div class="col">
        <label for="name" class="form-label">售票資訊 Ticket Info</label>
        <input type="text" class="form-control" id="name" value="{{ $attraction->ticket_info ?? '' }}" />
      </div>
      <div class="col">
        <label for="name" class="form-label">交通資訊 Traffic Info</label>
        <input type="text" class="form-control" id="name" value="{{ $attraction->traffic_info ?? '' }}" />
      </div>
      <div class="col">
        <label for="name" class="form-label">停車資訊 Parking Info</label>
        <input type="text" class="form-control" id="name" value="{{ $attraction->parking_info ?? '' }}" />
      </div>
    </div>
    <hr />
    {{-- --}}
    <p class="text-primary">位置 Position</p>
    <div id="city-county-selector" class="row mb-3">
      <div class="col">
        <label for="select_city" class="form-label">縣市 Region</label>
        <select class="form-control" id="select_city"></select>
      </div>
      <div class="col">
        <label for="select_area" class="form-label">區域 Town</label>
        <select class="form-control" id="select_area"></select>
      </div>
      <div class="col-12">
        <label for="address" class="form-label">地址 Address</label>
        <input class="form-control" id="address" />
      </div>
    </div>
    <hr />
    {{-- --}}
    <button class="btn btn-outline-primary btn-block">建立活動</button>
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
  const attraction = @json($attraction);

  attraction.images.forEach(image => {
    createImageBlock(image);
  });

  btn_upload_image.addEventListener('click', () => {
    event.preventDefault();
    createImageBlock();
  });

  function createImageBlock(image = null) {
    const div_col = document.createElement('div');
    div_col.classList.add('col-12');
    div_col.classList.add('col-sm-6');
    div_col.classList.add('col-md-4');
    div_col.classList.add('mb-3');
    div_col.classList.add('text-center');
    div_col.id = `div_uploadedImage_${uplodedImageCounter}`;
    const input_upload_image = document.createElement('input');
    input_upload_image.classList.add('form-control-file');
    input_upload_image.classList.add('mb-1');
    input_upload_image.setAttribute('type', 'file');
    input_upload_image.setAttribute('name', `images[${uplodedImageCounter}]`);
    input_upload_image.dataset.index = uplodedImageCounter;
    const input_image_desc = document.createElement('input');
    input_image_desc.classList.add('form-control');
    input_image_desc.classList.add('form-control-sm');
    input_image_desc.classList.add('mb-1');
    input_image_desc.setAttribute('placeholder', '圖片描述');
    input_image_desc.setAttribute('name', `image_desc[${uplodedImageCounter}]`);
    if (image) input_image_desc.setAttribute('placeholder', image.image_desc);
    const div_preview_image = document.createElement('div');
    div_preview_image.id = `div_preview_image_${uplodedImageCounter}`;
    const btn_delete_image = document.createElement('a');
    btn_delete_image.classList.add('btn_delete_image');
    btn_delete_image.classList.add('text-danger');
    btn_delete_image.dataset.index = uplodedImageCounter;
    btn_delete_image.setAttribute('href', '#');
    btn_delete_image.textContent = image ? '刪除圖片（已上傳）' : '刪除圖片';
    btn_delete_image.style.marginLeft = 'auto';

    div_col.appendChild(div_preview_image);
    div_col.appendChild(input_upload_image);
    div_col.appendChild(input_image_desc);
    div_col.appendChild(btn_delete_image);
    div_uploaded_images.prepend(div_col);
    if (image) createPreviewImageBlock(uplodedImageCounter, image.url);
    uplodedImageCounter++;
  }

  function createPreviewImageBlock(index, src) {
    const div_preview_image = document.getElementById(`div_preview_image_${index}`);
    div_preview_image.innerHTML = '';
    const previewImage = document.createElement('img');
    previewImage.src = src;
    previewImage.classList.add('img-fluid');
    previewImage.classList.add('mb-1');
    div_preview_image.append(previewImage);
  }

  div_uploaded_images.addEventListener('change', (e) => {
    const file = e.target.files[0];
    createPreviewImageBlock(e.target.dataset.index, window.URL.createObjectURL(file));
  });


  div_uploaded_images.addEventListener('click', ({ target: t }) => {
    if (t.className.includes('btn_delete_image')) {
      document.getElementById(`div_uploadedImage_${t.dataset.index}`).remove();
    }
  });
</script>
@endsection
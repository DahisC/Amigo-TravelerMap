@extends('layouts.amigo')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <form action="{{ route('backstage.attractions.update',['attraction'=>$attraction->id]) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          {{-- Page 1 活動資訊：name description ticket_info image_url image_desc --}}
          {{-- Page 2 地點資訊：country region town address traffic_info parking_info --}}
          {{-- Page 2 聯絡資訊：tel website --}}
          <p class="bg-warning">（Page 1 上半）聯絡資訊：tel website</p>

          {{-- 錯誤訊息 --}}
          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif





          <div class="form-outline mb-4">
            <input type="text" class="form-control" name="website"
            value="{{ old('website', optional($attraction ?? null)->website) }}" />
            <label class="form-label">
              官方網站（選填）
            </label>
          </div>
          <div class="form-outline mb-4">
            <input type="text" class="form-control" name="tel"
            value="{{ old('tel', optional($attraction ?? null)->tel) }}" />
            <label class="form-label">
              聯絡電話（選填）
            </label>
          </div>

          <p class="bg-warning">（Page 1 下半）活動資訊：name description ticket_info image_url image_desc</p>

          <div class="mb-4">
            <label class="form-label" for="attraction-form__image">上傳圖片</label>
            <input type="file" class="form-control" id="attraction-form__image" name="image_url" accept="image/*" />
          </div>
          <div class="form-outline mb-4">
            <input type="text" class="form-control" name="name" data-mdb-showcounter="true" maxlength="50"
            value="{{ old('name', optional($attraction ?? null)->name) }}" />
            <label class="form-label">名稱</label>
            <div class="form-helper"></div>
          </div>
          <div class="form-outline mb-4">
            <input type="text" class="form-control" name="description" data-mdb-showcounter="true" maxlength="500"
            value="{{ old('description', optional($attraction ?? null)->description) }}" />
            <label class="form-label">介紹</label>

            <div class="form-helper"></div>
          </div>
          <div class="form-outline mb-4">
            <input type="text" class="form-control" name="ticket_info"
            value="{{ old('ticket_info', optional($attraction ?? null)->ticket_info) }}" />
            <label class="form-label">
              入場資訊
            </label>
          </div>
          {{--  --}}
          <p class="bg-warning">（Page 2）地點資訊：country region town address traffic_info parking_info</p>

          @include('partials.form.select-city-county', ['defaultCity' => '臺中市', 'defaultArea' => '南區'])
          <div class="form-outline mb-4">
            <input type="text" class="form-control" name="address"
            value="{{ old('address', optional($attraction ?? null)->address) }}" />
            <label class="form-label">
              地址
            </label>
          </div>
          <div class="form-outline mb-4">
            <input type="text" class="form-control" name="traffic_info" 
            value="{{ old('traffic_info', optional($attraction ?? null)->traffic_info) }}" />
            <label class="form-label">
              交通資訊（選填）
            </label>
          </div>
          <div class="form-outline mb-4">
            <input type="text" class="form-control" name="parking_info"
            value="{{ old('parking_info', optional($attraction ?? null)->parking_info) }}" />
            <label class="form-label">
              停車資訊（選填）
            </label>
          </div>
          <button type="submit" class="btn btn-primary btn-block">更新</button>
        </form>
      </div>
    </div>
  </div>

@endsection

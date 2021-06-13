@extends('layouts.amigo')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-6">
      <form action="{{ route('backstage.attractions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
            value="https://www.facebook.com/85%E5%BA%A6c%E8%88%88%E5%A4%A7%E5%9C%93%E5%BB%B3%E5%BA%97-695997840771603/" />
          <label class="form-label">
            官方網站（選填）
          </label>
        </div>
        <div class="form-outline mb-4">
          <input type="text" class="form-control" name="tel" value="04-22850292" />
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
            value="要不要去８５？" />
          <label class="form-label">名稱</label>
          <div class="form-helper"></div>
        </div>
        <div class="form-outline mb-4">
          <input type="text" class="form-control" name="description" data-mdb-showcounter="true" maxlength="500"
            value="說拜託阿" />
          <label class="form-label">介紹</label>

          <div class="form-helper"></div>
        </div>
        <div class="form-outline mb-4">
          <input type="text" class="form-control" name="ticket_info" value="低消５０，謝絕不消費還拿延長線佔一桌坐整天的人" />
          <label class="form-label">
            入場資訊
          </label>
        </div>
        {{--  --}}
        <p class="bg-warning">（Page 2）地點資訊：country region town address traffic_info parking_info</p>

        @include('partials.form.select-city-county', ['defaultCity' => '臺中市', 'defaultArea' => '南區'])
        <div class="form-outline mb-4">
          <input type="text" class="form-control" name="address" value="412 臺中市台中市南區興大路145（中興大學圓廳餐廳）" />
          <label class="form-label">
            地址
          </label>
        </div>
        <div class="form-outline mb-4">
          <input type="text" class="form-control" name="traffic_info" value="走路可抵達，順便碰瓷" />
          <label class="form-label">
            交通資訊（選填）
          </label>
        </div>
        <div class="form-outline mb-4">
          <input type="text" class="form-control" name="parking_info" value="距離停車場約步行１２０步！！" />
          <label class="form-label">
            停車資訊（選填）
          </label>
        </div>
        <button type="submit" class="btn btn-primary btn-block">建立</button>
      </form>
    </div>
  </div>
</div>

@endsection
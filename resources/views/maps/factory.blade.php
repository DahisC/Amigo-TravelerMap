@extends('layouts.amigo')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>地圖編輯頁面（{{ $action }}）</h1>
        <p>需要的後端資料：</p>
        <ol>
          <li>所有地點</li>
          <li>對應地圖 ID 底下儲存的地點</li>
        </ol>
        <hr />
        <p>使用者可以做的動作：</p>
        <ul>
          <li>點選地圖上的地點，並在側邊欄的卡片上按下<a class="btn btn-primary" href="#">放進地圖中</a></li>
          <li>暫時不會有收藏地點的功能<a class="btn btn-primary" href="#">收藏地點</a></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
      </div>
    </div>
  </div>
@endsection

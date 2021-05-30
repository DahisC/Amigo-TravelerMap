@extends('layouts.amigo')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>地圖編輯頁面（{{ $action }}）</h1>
        <p>需要的後端資料：</p>
        <ol>
          <li>所有地點 $attractions（來自表 attractions）</li>
          <li>個人地圖儲存的地點</li>
          <li>使用者收藏的地點 $favorites</li>
        </ol>
        <hr />
        <p>使用者可以做的動作：</p>
        <ul>
          <li>可以透過點擊預設的地圖名稱後跳出一個彈跳視窗，並更新地圖的名稱
            <form action="{{ route('maps.update', ['map' => 5]) }}" method="POST">
              @csrf
              @method('PUT')
              <input hidden name="name" value="２０２１夏季京阪神五日遊！" />
              <button class="btn btn-primary">變更地圖名稱</button>
            </form>
          </li>
          <li>點選地圖上的地點，並在側邊欄的卡片上按下<a class="btn btn-primary" href="#">放進地圖中</a>並導回此頁面</li>
          <li>在地圖上點選地點，並在側邊欄的卡片中點擊
            <form action="{{ route('itineraries.store') }}" method="POST">
              @csrf
              <input hidden name="attraction_id" value="10" />
              <button class="btn btn-primary">收藏此地點</button>
            </form>時，在 user_attraction 表中新增一筆資料後重新導回此頁面（redirect()->back()）
          </li>
          <li>點下<a class="btn btn-primary" href="#">放棄編輯</a>後，回到上一個頁面</li>
        </ul>
      </div>
    </div>
  </div>
@endsection

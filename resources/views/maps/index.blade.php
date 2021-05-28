@extends('layouts.amigo')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>地圖頁面</h1>
        <p>需要的後端資料：</p>
        <ol>
          <li>全部的地點（來自表 attractions）</li>
          <li>使用者關注的所有地點（來自表 user_attraction）</li>
        </ol>
        <hr />
        <p>使用者可以做的動作：</p>
        <ul>
          <li>探索附近的地點，所以在進入頁面後就會自動在地圖上顯示距離較近的地點（使用變數 $attractions 並由前端計算距離）</li>
          <li>在地圖上點選地點，並在側邊欄的卡片中點擊
            <form action="{{ route('itineraries.store') }}" method="POST">
              @csrf
              <input hidden name="attraction_id" value="10" />
              <button class="btn btn-primary">收藏此地點</button>
            </form>（在 maps 表中新增一筆資料後回傳 ID）
            （在表 user_attraction 中新增一筆資料）
          </li>
          <li>可以點擊
            <form action="{{ route('maps.store') }}" method="POST">
              @csrf
              <button class="btn btn-primary">建立地圖</button>
            </form>（在 maps 表中新增一筆資料後回傳 ID）
          </li>
          <li>最佳化：點選地圖後，可以透過下拉選單將地點放入地圖中（所以需要從表 maps 撈出此使用者建立的地圖）</li>
        </ul>
        <hr />
        <p>當使用者按下搜尋按紐，可能會傳送以下形式的 query string：</p>
        <ul>
          <li>tags=1%2C2&distance=100</li>
        </ul>
        <p>上面的查詢字串表示的是搜尋 ID 1 與 2 的標籤，並且距離要小於 100 公尺內</p>
        <p>想了想覺得透過活動名稱查詢的方式好像可以廢棄</p>
        <p>搜尋好像也可以給前端做？如果要計算距離，後端則需要計算經緯度之間的直線距離再丟回來</p>
        <p>讓我想一下這個搜尋要不要用 AJAX！</p>
        <a class="btn btn-primary" href="/maps?tags=1%2C2&distance=100">搜尋按紐</a>
      </div>
    </div>
  </div>

  <script>
    const params = {
      tags: [1, 2],
      distance: 100
    };
    const qs = new URLSearchParams(params);
    console.log(qs.toString());

  </script>
@endsection

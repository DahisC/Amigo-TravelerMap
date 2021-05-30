@extends('layouts.amigo')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>收藏的地點</h1>
        <p>需要的後端資料：</p>
        <ol>
          <li>$此使用者收藏的地點（從表 user_attraction 撈取）</li>
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
        </ul>
      </div>
    </div>
  </div>
@endsection

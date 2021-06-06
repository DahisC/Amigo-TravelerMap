@extends('layouts.amigo');
@section('css')
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background-color: #f9f6ed;
    }

    .jumbotron {
      width: 100%;
      height: 700px;
      background-color: gray;
    }

    .logo {
      width: 151px;
      height: 151px;
      border-radius: 50%;
      margin: 0 auto;
      background-color: blue
    }

    .button {
      width: 514px;
      display: flex;
      justify-content: space-between;
      font-size: 30px;
      color: black;
      margin: 0 auto;
    }

    .trapezoid {
      background-image: url(./public/snow-image/trapezoid.png);
      width: 100%;
      height: fit-content;
      background-color: #6b8123;
    }

    .text {
      color: white;
      font-size: 36px;
    }

    .col h3 {
      color: white;
      font-size: 36px;
      margin: 0 auto;
    }

    .tra-pic {
      width: 469px;
      height: 549px;
    }

  </style>
@endsection

@section('content')
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <div class="logo"></div>
      <div class="button">
        <a href="" class="to">前往地圖</a>
        <a href="" class="collect">收藏地點</a>
        <a href="" class="edit">編輯個人地圖</a>
      </div>
    </div>
  </div>
  <div class="trapezoid">
    <div class="container ">
      <div class="row">
        <div class="col">
          <img src="" alt="" class="tra-pic">
        </div>
        <div class="col">
          <h3>關於地圖</h3>
          <p></p>
          <div class="text">
            不論是在獸皮上刻畫線條，還是在螢幕上使用繪圖軟體，幾千年來人類不斷用地圖來描述、回溯或是理解這個世界。而今，貝西‧梅森和葛瑞格‧米勒這兩位獲獎記者，以及國家地理網站熱門部落格All Over The
            Map格主，憑著對地圖的無比熱情，帶你穿越時空，回到過去也前往未來，環遊世界並飛上穹蒼──而且完全是透過地圖迷人的藝術與科學。
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')

@endsection

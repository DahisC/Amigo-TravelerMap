@extends('layouts.amigo')

{{-- @section('nav')

@endsection --}}

@section('title')
Buen Camino
@endsection

@section('css')
<style>
  html {
    font-size: 18px;
    color: white;
  }

  .a-fs-1 {
    font-size: 1.33rem;
  }

  .a-fs-2 {
    font-size: 2rem;
  }

  .a-fs-3 {
    font-size: 4rem;
  }

  section {
    height: 100vh;
  }

  .a-vertical-title {
    writing-mode: vertical-lr;
    transform: rotate(180deg);
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>
@endsection

@section('content')
<section>
  <div class="h-100 container">
    <div class="h-100 row">
      <div class="h-100 col d-flex justify-content-center align-items-center">
        <h1>突然不知道要去哪裡？</h1>
      </div>
    </div>
  </div>
</section>
<!-- ¿Quién soy yo? / Who am I? -->
<section>
  <div class="h-100 d-flex flex-column">
    <div class="flex-grow-1"></div>
    <div class="flex-grow-1 text-white" style="max-height: 34%; background-color: rgba(0, 0, 0, 80%);">
      <div class="h-100 container">
        <div class="h-100 row">
          <div class="h-100 col text-center">
            <h1 class="a-fs-3 h-50 d-flex justify-content-center align-items-center">¿Quién soy yo?</h1>
            <h2 class="a-fs-2">Who am I?</h2>
          </div>
          <div class="col d-flex flex-column justify-content-end">
            <p>阿米狗是每個人的旅人地圖，記錄著那些短暫出現卻又精彩萬分的事物 </p>
            <p>源自於西班牙文中「朋友」的 Amigo 一詞，我們就像那位最凱瑞你的朋友！</p>
            <p>在你的旅途中提供指引，將有趣的地點、活動介紹給你就是我們的使命。</p>
            <p>接下來，就讓我隆重地自我介紹我能做什麼吧！</p>
          </div>
        </div>
      </div>
    </div>
    <div class="flex-grow-1"></div>
  </div>
</section>
<!-- Explore -->
<section style="height: 200vh;">
  <div class="h-100 container">
    <div class="h-100 row">
      <div class="h-100 col d-flex flex-column justify-content-evenly">
        <!-- Attractions -->
        <div class="row h-25">
          <div class="col-2 a-vertical-title a-fs-3">
            Attractions
          </div>
          <div class="col-3 d-flex justify-content-center align-items-center">
            <div class="w-75 ratio ratio-1x1 rounded-circle border border-5"></div>
          </div>
          <div class="col-1"></div>
          <div class="col-5 d-flex flex-column justify-content-evenly py-5">
            <p class="a-fs-1">「附近有什麼好玩的？」</p>
            <div>
              <p>當這句話脫口而出的那一刻，阿米狗便應運而生。</p>
              <p>阿米狗蒐集了世界上各處的有趣地點與活動，也替你留意了那些在你匆忙的步伐中隨時可能擦身而過的事物。</p>
              <p> 想一個人坐在附近的街上靜靜地聽著街頭藝人的低吟淺唱？</p>
              <p>亦或是在初次拜訪的小鎮上加入熱鬧歡騰的節慶遊行？</p>
              <p>這些地點，請讓我一一向你介紹！</p>
            </div>
          </div>
          <div class="col-1"></div>
        </div>
        <!-- Maps -->
        <div class="row h-25 flex-row-reverse">
          <div class="col-2 a-vertical-title a-fs-3" style="transform: rotate(0deg);">
            Map
          </div>
          <div class="col-3 d-flex justify-content-center align-items-center">
            <div class="w-75 ratio ratio-1x1 rounded-circle border border-5"></div>
          </div>
          <div class="col-1"></div>
          <div class="col-5 d-flex flex-column justify-content-evenly py-5">
            <p class="a-fs-1">透過地圖探索世界</p>
            <div>
              <p>
                遇到喜歡的骨頭就要收藏起來細細品嘗，<br />
                就像看到錢包裡亮晶晶的50元硬幣都捨不得花掉！
              </p>
              <p>阿米狗替你在地圖上標示出了有趣的地點，讓你可以簡單地透過地圖看看附近有什麼有趣的事情！</p>
              <p>
                隨手為喜歡的地點按顆星，<br />
                晚點就可以集滿周末的行程了！
              </p>
            </div>
          </div>
          <div class="col-1"></div>
        </div>
        <!-- Itineraries -->
        <div class="row h-25">
          <div class="col-2 a-vertical-title a-fs-3">
            Itineraries
          </div>
          <div class="col-3 d-flex justify-content-center align-items-center">
            <div class="w-75 ratio ratio-1x1 rounded-circle border border-5"></div>
          </div>
          <div class="col-1"></div>
          <div class="col-5 d-flex flex-column justify-content-evenly py-5">
            <p class="a-fs-1">那個行程有夠讚！</p>
            <div>
              <p>收藏起來的地點好想分享給家人朋友們知道！</p>
              <p>阿米狗已經把分享鍵放在收藏頁裡啦！</p>
              <p>整理控可以將收藏的地點分門別類放進自己的專屬地圖，快揪團出門踏踏吧！</p>
            </div>
          </div>
          <div class="col-1"></div>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="h-100 d-flex flex-column">
    <div class="flex-grow-1"></div>
    <div class="flex-grow-1 text-white" style="max-height: 34%; background-color: rgba(0, 0, 0, 80%);">
      <div class="h-100 container">
        <div class="h-100 row flex-row-reverse">
          <div class="col-1"></div>
          <div class="h-100 col text-center">
            <h1 class="a-fs-3 h-50 d-flex justify-content-center align-items-center">¿Quién eres?</h1>
            <h2 class="a-fs-2">Who are YOU?</h2>
          </div>
          <div class="col d-flex flex-column justify-content-end">
            <p>在旅途中，我們都可能會彼此交會</p>
            <p>作為旅人，在一段旅程中有可能會是一個追尋者，也可能會是引導者。</p>
            <p>在接下來的旅途中，你想當哪一個？</p>
          </div>
          <div class="col-1"></div>
        </div>
      </div>
    </div>
    <div class="flex-grow-1"></div>
  </div>
</section>
<section>
  <div class="h-100 container">
    <div class="h-100 row">
      <div class="h-100 col text-center d-flex flex-column justify-content-evenly">
        <h3>
          Traveler<br />
          旅人
        </h3>
        <div class="w-50 ratio ratio-1x1 rounded-circle border border-5 mx-auto"></div>
        <div>
          <p>旅人，同時也是追尋者。</p>
          <p>
            追尋著那些我們不曾踏足過的境地、<br />
            也追逐著那些不曾映入眼簾的景色。
          </p>
          <p>作為旅人，你可以盡情地透過地圖搜尋那些你感興趣的事物，並隨時準備好開啟你的旅程！</p>
        </div>
      </div>
      <div class="h-100 col text-center d-flex flex-column justify-content-evenly">
        <h3>
          Guider<br />
          嚮導
        </h3>
        <div class="w-50 ratio ratio-1x1 rounded-circle border border-5 mx-auto"></div>
        <div>
          <p>嚮導，同時也是引導者。</p>
          <p>
            引領著旅人打開他們的眼界、<br />
            又或者以藝術感動人心。
          </p>
          <p>作為嚮導，你除了像旅人一樣可以使用網站上的所有功能，同時也可以在地圖上建立自己的活動。</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="h-100 d-flex flex-column">
    <div class="flex-grow-1"></div>
    <div class="flex-grow-1 text-white" style="max-height: 34%; background-color: rgba(0, 0, 0, 80%);">
      <div class="h-100 container">
        <div class="h-100 row flex-row-reverse">
          <div class="col-1"></div>
          <div class="h-100 col text-center">
            <h1 class="a-fs-3 h-100 d-flex justify-content-center align-items-center">Buen Camino</h1>
          </div>
          <div class="col d-flex flex-column justify-content-end">
            <h2 class="a-fs-2 h-50 d-flex justify-content-center align-items-center">祝福在旅途中的你</h2>
            <p>在西班牙文中，「Camino」指的是道路；但如今也被代稱為歐洲古老的道路：Camino de Santiago－－意即聖地牙哥朝聖之路。</p>
            <p>朝聖之路是旅人一路從歐洲前往西班牙聖地牙哥大教堂的路線，途中的旅人會以「Buen Camino」祝福那些同在這條路上風雨同行的彼此。</p>
          </div>
          <div class="col-1"></div>
        </div>
      </div>
    </div>
    <div class="flex-grow-1"></div>
  </div>
</section>
@endsection

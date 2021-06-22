@extends('layouts.amigo')

{{-- @section('nav')

@endsection --}}

@section('title')
Buen Camino
@endsection

@section('css')
<style>
  body {
    padding-top: 0 !important;
  }

  section:not(.index-banner) {
    min-height: 100vh;
  }

  #header {
    height: 100vh;
  }

  .index-banner {
    background-color: var(--mdb-primary);
  }

  .index-banner__description {
    background-color: var(--mdb-primary);
    color: var(--mdb-dark);
    height: 40%;
  }

  @media (min-width: 768px) {
    .index-banner__description {
      height: 25%;
    }
  }

  /* section:not(:first-of-type) {
    padding-top: 55px 0;
  } */

  /* section:not(:last-of-type) {
    margin-bottom: 55px;
  } */

  .a-vertical-title {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  @media (min-width: 768px) {
    .a-vertical-title {
      writing-mode: vertical-lr;
      transform: rotate(180deg);
    }
  }

  .a-background {
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
  }
</style>

@endsection


@section('content')
{{-- @include('partials.scroll-indicator') --}}
{{-- <div id="list-example" class="list-group position-fixed">
  <a class="list-group-item list-group-item-action" href="#list-item-1">Item 1</a>
  <a class="list-group-item list-group-item-action" href="#list-item-2">Item2</a>
  <a class="list-group-item list-group-item-action" href="#list-item-3">Item 3</a>
  <a class="list-group-item list-group-item-action" href="#list-item-4">Item 4</a>
</div> --}}
<main>
  <section id="header">
    <div class="h-100 container">
      <div class="h-100 row">
        <div class="h-100 col d-flex justify-content-center align-items-center">
          <h1>突然不知道要去哪裡？</h1>
        </div>
      </div>
    </div>
  </section>
  <!-- ¿Quién soy yo? / Who am I? -->
  <section id="banner-about-me" class="index-banner py-5">
    <div class="index-banner__description position-sticky bottom-0">
      <div class="h-100 container py-5">
        <div class="h-100 row">
          <div class="col-12 col-md-6 text-center d-flex flex-column justify-content-center">
            <h1 class="a-fs-3"><b>¿Quién soy yo?</b></h1>
            <h2 class="a-fs-1 text-muted">Who am I?</h2>
          </div>
          <div class="col-12 col-md-6 d-flex flex-column justify-content-center text-center">
            <p><b>阿米狗是每個人的旅人地圖，記錄著那些短暫出現卻又精彩萬分的事物</b></p>
            <p>源自於西班牙文中「朋友」的 Amigo 一詞，我們就像那位最凱瑞你的朋友！</p>
            <p>在你的旅途中提供指引，將有趣的地點、活動介紹給你就是我們的使命。</p>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- Explore -->
  <section id="features" class="py-5">
    {{-- <section id="features" style="height: 200vh;"> --}}
    <div class="h-100 container py-5">
      <div class="h-100 row text-center text-md-start py-5">
        <div class="h-100 col d-flex flex-column">
          <!-- Attractions -->
          <div class="row h-25 mb-11">
            <div class="col-12 col-md-2 a-vertical-title a-fs-4 mb-3 mb-md-0">
              <b>A</b>ttractions
            </div>
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center mb-5 mb-md-0">
              <div class="w-75 ratio ratio-1x1 rounded-circle border border-5 a-background" style="background-image: url({{ asset('images/page/index/Attractions.png') }})"></div>
            </div>
            <div class="col-12 col-md-6 d-flex flex-column justify-content-evenly">
              <p class="a-fs-1 mb-4 mb-md-0">「附近有什麼好玩的？」</p>
              <div class="mb-3 mb-md-0">
                <p>當這句話脫口而出的那一刻，阿米狗便應運而生。</p>
                <p>阿米狗蒐集了世界上各處的有趣地點與活動，也替你留意了那些在你匆忙的步伐中隨時可能擦身而過的事物。</p>
                <p>想一個人坐在附近的街上靜靜地聽著街頭藝人的低吟淺唱？</p>
                <p>亦或是在初次拜訪的小鎮上加入熱鬧歡騰的節慶遊行？</p>
                <p>還是想一個人來趟關於藝術的薰陶之旅？</p>
                <p>心動不如……</p>
              </div>
              <div>
                <button class="btn btn-outline-primary">馬上行動！</button>
              </div>
            </div>
          </div>
          <!-- Maps -->
          <div class="row flex-row-reverse h-25 mb-11 row-v">
            <div class="col-12 col-md-2 a-vertical-title a-fs-4 mb-3 mb-md-0" style="transform: rotate(0deg);">
              <b>M</b>ap
            </div>
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center mb-5 mb-md-0">
              <div class="w-75 ratio ratio-1x1 rounded-circle border border-5 a-background" style="background-image: url({{ asset('images/page/index/Map.png') }})"></div>
            </div>
            <div class="col-12 col-md-6 d-flex flex-column justify-content-evenly">
              <p class="a-fs-1 mb-4 mb-md-0">透過地圖旅行</p>
              <div class="mb-3 mb-md-0">
                <p>
                  遇到喜歡的骨頭就要收藏起來細細品嘗，<br />
                  就像看到錢包裡亮晶晶的50元硬幣都捨不得花掉！
                </p>
                <p>
                  阿米狗替你在地圖上標示出了有趣的地點，<br />
                  讓你可以簡單地透過地圖看看附近有什麼有趣的事情！
                </p>
                <p>
                  隨手為喜歡的地點按顆星加入收藏，<br />
                  晚點就可以集滿周末的行程了！
                </p>
              </div>
              <div>
                <button class="btn btn-outline-primary">看看阿米狗的行程！</button>
              </div>
            </div>
          </div>
          <!-- Itineraries -->
          <div class="row h-25">
            <div class="col-12 col-md-2 a-vertical-title a-fs-3 mb-3 mb-md-0">
              <b>I</b>tineraries
            </div>
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center mb-5 mb-md-0">
              <div class="w-75 ratio ratio-1x1 rounded-circle border border-5 a-background" style="background-image: url({{ asset('images/page/index/Itineraries.png') }})"></div>
            </div>
            <div class="col-12 col-md-6 d-flex flex-column justify-content-evenly">
              <p class="a-fs-1 mb-4 mb-md-0">獨特的行程表</p>
              <div class="mb-3 mb-md-0">
                <p>
                  收藏起來的地點好想分享給家人朋友們知道？<br />
                  阿米狗已經把分享鍵放在收藏頁裡啦！
                </p>
                <p>除了可以將喜歡的地點透過收藏按鈕放進屬於自己的收藏頁面以外，<br />
                  整理控甚至可以將收藏的地點分門別類放進自己的個人地圖，<br />
                  讓你可以將自己的地圖分享給厝邊頭尾～
                </p>
                <p>
                  還猶豫什麼？快揪團出門踏踏吧！
                </p>
              </div>
              <div>
                <button class="btn btn-outline-primary">看看行程！</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="banner-about-you" class="index-banner py-5">
    <div class="index-banner__description position-sticky bottom-0">
      <div class="h-100 container py-5">
        <div class="h-100 row flex-row-reverse">
          <div class="h-100 col text-center d-flex flex-column justify-content-center">
            <h1 class="a-fs-3"><b>¿Quién eres?</b></h1>
            <h2 class="a-fs-1 text-muted">Who are YOU?</h2>
          </div>
          <div class="col d-flex flex-column justify-content-center text-center">
            <p><b>在旅途中，我們都可能會彼此交會</b></p>
            <p>作為旅人，在一段旅程中有可能會是一個追尋者，也可能會是引導者。</p>
            <p>在接下來的旅途中，你想當哪一個？</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="roles" class="py-5">
    {{-- https://stackoverflow.com/questions/8468066/child-inside-parent-with-min-height-100-not-inheriting-height --}}
    <div class="h-100 container py-5">
      <div class="h-100 row py-5">
        <div class="h-100 col-12 col-md-6 text-center mb-9 mb-md-0 d-flex flex-column justify-content-center">
          <h3 class="mb-3">
            Traveler<br />
            旅人
          </h3>
          <div class="w-50 ratio ratio-1x1 rounded-circle border border-5 mx-auto mb-5"></div>
          <div>
            <p>旅人，同時也是追尋者。</p>
            <p>
              追尋著那些我們不曾踏足過的境地、<br />
              也追逐著那些不曾映入眼簾的景色。
            </p>
            <p>
              作為旅人，你可以盡情地透過地圖搜尋那些你感興趣的事物，<br />
              並隨時準備好開啟你的旅程！
            </p>
          </div>
        </div>
        <div class="h-100 col-12 col-md-6 text-center d-flex flex-column justify-content-center">
          <h3 class="mb-3">
            Guider<br />
            嚮導
          </h3>
          <div class="w-50 ratio ratio-1x1 rounded-circle border border-5 mx-auto mb-5"></div>
          <div>
            <p>嚮導，同時也是引導者。</p>
            <p>
              引領著旅人打開他們的眼界、<br />
              又或者以藝術感動人心。
            </p>
            <p>
              作為嚮導，你除了像旅人一樣可以使用網站上的所有功能，<br />
              同時也可以在地圖上建立自己的活動。
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="banner-the-end" class="index-banner py-5">
    <div class="index-banner__description position-sticky bottom-0">
      <div class="h-100 container py-5">
        <div class="h-100 row flex-row-reverse">
          <div class="h-100 text-center d-flex flex-column justify-content-between py-3">
            <h1 class="a-fs-3">Buen Camino</h1>
            <h2 class="a-fs-2">一路順風</h2>
            <div class="col d-flex flex-column justify-content-center">
              <p>在西班牙文中，「Camino」指的是道路；但如今也被代稱為歐洲古老的道路：Camino de Santiago－－意即聖地牙哥朝聖之路。</p>
              <p>朝聖之路是旅人一路從歐洲前往西班牙聖地牙哥大教堂的路線，途中的旅人會以「Buen Camino」祝福那些同在這條路上風雨同行的彼此。</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
{{-- <footer style="height: 50vh">
  Footer
</footer> --}}
@endsection

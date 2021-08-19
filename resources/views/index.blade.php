@extends('layouts.amigo')

{{-- @section('nav')

@endsection --}}

@section('title')
Buen Camino
@endsection

@section('css')
<style>
  section:not(.index-banner) {
    min-height: 100vh;
  }

  /* 修正子元素無法從父元素繼承 height: 100% 高度的問題 */
  /* section:not(.index-banner)>.container,
  section:not(.index-banner)>.container>.row {
    min-height: inherit;
  } */

  #header {
    height: 100vh;
  }

  .index-banner {
    background-color: var(--mdb-primary);
  }

  .index-banner__description {
    background-color: var(--mdb-primary);
    color: var(--mdb-dark);
  }

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
        <div class="h-100 col d-flex flex-column justify-content-center align-items-center">
          <h1 class="mb-5 a-fs-4">突然不知道要去哪裡？</h1>
          <a class="btn btn-secondary btn-lg" href="{{ route('maps.index') }}">探索周遭的地點</a>
        </div>
      </div>
    </div>
  </section>
  <!-- ¿Quién soy yo? / Who am I? -->
  <section id="banner-about-me" class="index-banner py-4">
    <div class="index-banner__description position-sticky bottom-0 a-background" style="background-image: url({{ asset('images/page/index/banner-who-am-III.png') }})">
      <div class="container py-4">
        <div class="row">
          <div class="col-12 col-md-6 text-center d-flex flex-column justify-content-center mb-4 mb-md-0">
            <h1 class="a-fs-3"><b>¿Quién soy yo?</b></h1>
            <h2 class="a-fs-2 text-muted">Who am I?</h2>
          </div>
          <div class="col-12 col-md-6 d-flex flex-column justify-content-center text-center">
            <h3 class="a-fs-0 my-4">
              <b>
                阿米狗是每個人的旅人地圖，<br />
                記錄著那些短暫出現卻又精彩萬分的事物
              </b>
            </h3>
            <p>
              源自於西班牙文中「朋友」的 Amigo 一詞，<br />
              我們就像那位最凱瑞你的朋友！
            </p>
            <p>
              在你的旅途中提供指引，<br />
              將有趣的地點、活動介紹給你就是我們的使命。
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Explore -->
  <section id="features" class="py-5">
    {{-- <section id="features" style="height: 200vh;"> --}}
    <div class="container py-0 py-md-5">
      <div class="row py-0 py-md-5">
        <div class="col d-flex flex-column">
          <!-- Attractions -->
          <div class="row mb-8 mb-md-11">
            <div class="col-12 col-md-2 a-vertical-title mb-3 mb-md-0">
              <h1 class="a-fs-4"><b class="text-primary">A</b><span class="text-dark">ttractions</span></h1>
            </div>
            <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-start align-items-center mb-5 mb-md-0">
              <div class="w-75 ratio ratio-1x1 rounded-circle border border-3 a-background border-secondary" style="background-image: url({{ asset('images/page/index/attractions.png') }})"></div>
            </div>
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
              <h2 class="a-fs-1 mb-4 text-primary text-center text-md-start">「附近有什麼好玩的？」</h2>
              <div class="text-dark mb-2">
                <p>當這句話脫口而出的那一刻，阿米狗便應運而生。</p>
                <p>
                  阿米狗蒐集了世界上各處的有趣地點與活動，<br />
                  也替你留意了那些在匆忙的步伐中隨時可能擦身而過的事物。
                </p>
                <p>
                  想一個人坐在附近的街上靜靜地聽著街頭藝人的低吟淺唱？<br />
                  亦或是在初次拜訪的小鎮上加入熱鬧歡騰的節慶遊行？<br />
                  還是想一個人來趟關於藝術的薰陶之旅？
                </p>
                <p>這些地點，我們都幫你整理好了～</p>
              </div>
              {{-- <div class="text-center text-md-start">
                <a class="btn btn-outline-secondary" data-mdb-ripple-color="secondary" href="{{ route('attractions.index') }}">去看看！</a>
            </div> --}}
          </div>
        </div>
        <!-- Maps -->
        <div class="row flex-row-reverse mb-8 mb-md-11">
          <div class="col-12 col-md-2 a-vertical-title mb-3 mb-md-0" style="transform: rotate(0deg);">
            <h1 class="a-fs-4"><b class="text-primary">M</b><span class="text-dark">ap</span></h1>
          </div>
          <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-end align-items-center mb-5 mb-md-0">
            <div class="w-75 ratio ratio-1x1 rounded-circle border border-3 a-background border-secondary" style="background-image: url({{ asset('images/page/index/map.png') }})"></div>
          </div>
          <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
            <h2 class="a-fs-1 mb-4 text-primary text-center text-md-start">透過地圖旅行</h2>
            <div class="text-dark mb-2">
              <p>
                遇到喜歡的骨頭就要收藏起來細細品嘗，<br />
                就像看到錢包裡亮晶晶的 50 元硬幣都捨不得花掉！
              </p>
              <p>
                阿米狗替你在地圖上標示出了有趣的地點，<br />
                讓你可以簡單地透過地圖看看附近有什麼有趣的事情。
              </p>
              <p>
                隨手為喜歡的地點按顆星加入收藏，<br />
                晚點就可以集滿周末的行程了！
              </p>
            </div>
            <div class="text-center text-md-end">
              <a class="btn btn-outline-secondary mb-2" data-mdb-ripple-color="secondary" href="{{ route('maps.show', ['map' => 1]) }}">
                看看阿米狗的地圖
                <i class="fas fa-paw ms-1 text-dark" style="transform: rotateZ(-30deg);"></i>
              </a>
              <div class="text-muted">
                <small class="fst-italic">
                  「問我西班牙有哪些有趣的活動？點了不就知道了？」
                </small>
                {{-- <div class="text-end"><small>－－阿米狗，西班牙的地頭貓</small></div> --}}
              </div>
            </div>
          </div>
        </div>
        <!-- Itineraries -->
        <div class="row">
          <div class="col-12 col-md-2 a-vertical-title mb-3 mb-md-0">
            <h1 class="a-fs-4"><b class="text-primary">I</b><span class="text-dark">tineraries</span></h1>
          </div>
          <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-start align-items-center mb-5 mb-md-0">
            <div class="w-75 ratio ratio-1x1 rounded-circle border border-3 a-background border-secondary" style="background-image: url({{ asset('images/page/index/itineraries.png') }})"></div>
          </div>
          <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
            <h2 class="a-fs-1 mb-4 text-primary text-center text-md-start">獨特的行程表</h2>
            <div class="text-dark mb-2">
              <p>
                收藏起來的地點好想分享給家人朋友們知道？<br />
                阿米狗已經把分享鍵放在收藏頁裡啦！
              </p>
              <p>
                除了可以將喜歡的地點透過收藏按鈕放進屬於自己的收藏頁面以外，<br />
                整理控甚至可以將收藏的地點分門別類放進自己的個人地圖，<br />
                讓你可以將自己的地圖分享給厝邊頭尾～
              </p>
              <p>而且阿米狗也提供了將行程表列印或者是寄送到信箱內的功能！</p>
              <p>
                還猶豫什麼？快揪團出門踏踏吧！
              </p>
            </div>
            <div class="text-center text-md-end">
              <a class="btn btn-outline-secondary mb-2" data-mdb-ripple-color="secondary" href="{{ route('maps.itineraries', ['map' => 1]) }}">
                觀看阿米狗的行程表
                <i class="fas fa-paw ms-1 text-dark" style="transform: rotateZ(-30deg);"></i>
              </a>
              <div class="text-muted">
                <small class="fst-italic">
                  「出去玩沒行程表怎麼行？快按按看這顆魔法按鈕！」
                </small>
                {{-- <div class="text-end"><small>－－阿米狗（現在是貓），喵！</small></div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <section id="banner-about-you" class="index-banner py-4">
    <div class="index-banner__description position-sticky bottom-0 a-background" style="background-image: url({{ asset('images/page/index/banner-who-are-you.png') }})">
      <div class="container py-4">
        <div class="row flex-row-reverse">
          <div class="col-12 col-md-6 text-center d-flex flex-column justify-content-center mb-4 mb-md-0">
            <h1 class="a-fs-3"><b>¿Quién eres?</b></h1>
            <h2 class="a-fs-2 text-muted">Who are YOU?</h2>
          </div>
          <div class="col-12 col-md-6 d-flex flex-column justify-content-center text-center">
            <h3 class="a-fs-0 my-4">
              <b>
                在旅途中，我們都可能會彼此交會
              </b>
            </h3>
            <p>
              作為旅人，<br />
              在一段旅程中有可能會是一個追尋者，<br />
              也可能會是引導者。
            </p>
            <p>
              在接下來的旅途中，你想當哪一個？
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="roles" class="py-5">
    {{-- https://stackoverflow.com/questions/8468066/child-inside-parent-with-min-height-100-not-inheriting-height --}}
    <div class="container py-0 py-md-5">
      <div class="row align-items-center py-0 py-md-5">
        <div class="col-12 col-md-6 text-center mb-8 mb-md-0 d-flex flex-column justify-content-center">
          <h3 class="mb-4 text-primary">
            Traveler<br />
            旅人
          </h3>
          <div class="w-50 ratio ratio-1x1 rounded-circle border border-3 mx-auto mb-5 border-secondary a-background" style="background-image: url({{ asset('images/page/index/role-traveler.png') }})"></div>
          <div class="text-dark">
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
        <div class="col-12 col-md-6 text-center mb-8 mb-md-0 d-flex flex-column justify-content-center">
          <h3 class="mb-4 text-primary">
            Guider<br />
            嚮導
          </h3>
          <div class="w-50 ratio ratio-1x1 rounded-circle border border-3 mx-auto mb-5 border-secondary a-background" style="background-image: url({{ asset('images/page/index/role-guider.png') }})"></div>
          <div class="text-dark">
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
      <div class="row">
        <div class="col text-center">
          <a class="btn btn-secondary" href="{{ route('sign-up') }}">加入冒險</a>
        </div>
      </div>
    </div>
  </section>
  <section id="banner-the-end" class="index-banner py-4">
    <div class="index-banner__description position-sticky bottom-0 a-background" style="background-image: url({{ asset('images/page/index/buen-camino.png') }}); background-size:">
      <div class="container py-4">
        <div class="row py-0 py-md-4">
          <div class="col-12 text-center d-flex flex-column justify-content-center mb-4">
            <h1 class="a-fs-3"><b>Buen Camino</b></h1>
            <h2 class="a-fs-2 text-muted">一路順風</h2>
          </div>
          <div class="col-12 d-flex flex-column justify-content-center text-center">
            <p>
              <i>在西班牙文中，「Camino」指的是道路；但如今也被代稱為歐洲古老的道路：Camino de Santiago－－意即聖地牙哥朝聖之路。</i>
            </p>
            <p>
              <i>朝聖之路是旅人一路從歐洲前往西班牙聖地牙哥大教堂的路線，途中的旅人會以「Buen Camino」祝福那些同在這條路上風雨同行的彼此。</i>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

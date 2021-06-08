@extends('layouts.amigo')

@section('title')
  @parent
  註冊
@endsection

@section('nav')

@endsection

@section('css')
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Megrim&display=swap" rel="stylesheet">
  <style>
    body {
      /* background-color: #9ad3bc; */
      background: url('images/sign-in.png') no-repeat center center;
      background-size: cover;
      height: 100vh;
    }

    .logo {
      font-family: 'Megrim', cursive !important;
      text-decoration: none;
    }

    #form_slider {
      /* overflow: hidden; */
      left: 0%;
      transition: left .75s ease-in;
    }

    #form_slider.forward {
      left: -100%
    }

    .role-card {
      height: 50%;
      width: 100%;
      background-color: rgba(255, 255, 255, 0.5);
    }

    .role-card:hover {
      background-color: #333;
      transition: all 0.5s linear;
    }

    @media (min-width: 576px) {
      .role-card {
        height: 100%;
      }
    }

    @media (min-width: 768px) {
      .role-card {
        width: 80%;
      }
    }

    @media (min-width: 992px) {
      .role-card {
        width: 70%;
      }
    }

    @media (min-width: 1200px) {
      .role-card {
        width: 60%;
      }
    }

    @media (min-width: 1400px) {
      .role-card {
        width: 50%;
      }
    }

  </style>
@endsection

@section('content')
  <div class="d-flex flex-column h-100">
    <nav class="text-center shadow-sm py-2">
      <a class="h1 logo text-secondary" href="/">Amigo</a>
    </nav>
    <form class="flex-grow-1 position-relative overflow-hidden step1" action="{{ route('register') }}" method="POST">
      @csrf
      <div id="form_slider" class="h-100 w-100 position-absolute">
        <div class="h-100 w-100 signup-form__choose-role text-center flex-shrink-0 position-absolute">
          {{-- <div class="py-1 text-center text-secondary">
            <p class="mb-1">選擇角色</p>
            <small>透過建立活動可以讓其它使用者透過地圖得知關於你的表演資訊！</small>
          </div> --}}
          <div class="d-flex flex-column flex-sm-row p-sm-3 px-md-4 px-lg-5" style="height: 90%;">
            <div class="role-card d-flex flex-column me-sm-3 py-2 px-sm-3 px-md-5 py-md-3 rounded">
              <div class="form-check">
                <label for="role-Traveler" class="form-check-label text-dark fw-bold">
                  <input id="role-Traveler" type="radio" class="form-check-input" value="Traveler" checked>
                  旅人 Traveler
                </label>
              </div>
              <small>你是旅人，有著熱愛冒險的靈魂</small>
              <hr />
              <div class="flex-grow-1"
                style="background: url(https://www.deachsword.com/db/sinoalice/images/character/134) top center no-repeat; background-size: cover;">
              </div>
              <hr />
              <small class="text-danger">※你將無法在網站中建立自己的活動</small>
            </div>

            <div class="role-card d-flex flex-column ms-sm-3 py-2 px-sm-3 px-md-5 py-md-3 rounded">
              <div class="form-check">
                <label class="form-check-label text-dark fw-bold">
                  <input id="role-Artist" type="radio" class="form-check-input" name="role" value="Artist">
                  藝術家 Artist
                </label>
              </div>
              <small>比起冒險，你更希望能感動人心</small>
              <hr />
              <div class="flex-grow-1"
                style="background: url(https://www.deachsword.com/db/sinoalice/images/character/278) top center no-repeat; background-size: cover;">
              </div>
              <hr />
              <small class="text-success">※你將可以在網站中建立自己的活動</small>
            </div>

          </div>
          <div class="d-flex flex-column justify-content-center align-items-center" style="height: 10%;">
            <button id="btn_fillForm" class="btn btn-primary d-block" type="button">
              繼續填寫資料
            </button>
          </div>
        </div>
        <div class="h-100 w-100 flex-shrink-0 position-absolute" style="left: 100%;">
          <div class="container" style="height: 90%;">
            <div class="row justify-content-center align-items-center h-100">
              <div class="col-10 col-sm-8 col-md-6 col-lg-5">
                <div class="card">
                  <hr class="my-0" />
                  <div class="card-body p-4">
                    <div class="form__user-info">
                      <div class="form-outline mb-4">
                        <input id="register-form__name" type="text"
                          class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                          required placeholder="暱稱" />
                        <label for="register-form__name" class="form-label">
                          <i class="fas fa-fw fa-user me-1"></i>
                          暱稱
                        </label>
                        @error('name')
                          <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </div>
                        @enderror
                      </div>

                      <!-- 輸入信箱欄位 -->
                      <div class="form-outline mb-4">
                        <input id="register-form__email" type="email"
                          class="form-control @error('email') is-invalid @enderror" name="email"
                          value="{{ old('email') }}" required placeholder="Email" />
                        <label for="register-form__email" class="form-label">
                          <i class="fas fa-fw fa-envelope me-1"></i>
                          Email
                        </label>
                        @error('email')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="row g-2 mb-4">
                        <!-- 輸入密碼欄位 -->
                        <div class="col">
                          <div class="form-outline">
                            <input id="register-form__password" type="password"
                              class="form-control @error('password') is-invalid @enderror" name="password" required
                              placeholder="密碼" />
                            <label for="register-form__password" class="form-label">
                              <i class="fas fa-fw fa-key me-1"></i>
                              密碼
                            </label>
                            @error('password')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                        <!-- 輸入密碼欄位 -->
                        <div class="col mb-4">
                          <div class="form-outline">
                            <input id="register-form__password-confirm" type="password" class="form-control"
                              name="password_confirmation" required placeholder="確認密碼" />
                            <label for="register-form__password-confirm" class="form-label">
                              確認密碼
                            </label>
                            @error('password')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-12 text-end mt-0">
                          <a href="{{ route('sign-in') }}">
                            <small>登入頁面在哪兒？</small>
                          </a>
                        </div>
                      </div>
                      <!-- 按鈕 -->
                      <button type="submit" class="btn btn-primary w-100">註冊</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex flex-column justify-content-center align-items-center" style="height: 10%;">
            <button id="btn_selectRole" class="btn btn-primary d-block" type="button">
              重新選擇角色
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>

@endsection

@section('js')
  <script>
    btn_fillForm.addEventListener('click', activeSlider);
    btn_selectRole.addEventListener('click', inactiveSlider);

    function activeSlider() {
      form_slider.classList.add('forward');
    }

    function inactiveSlider() {
      form_slider.classList.remove('forward');
    }

  </script>
@endsection

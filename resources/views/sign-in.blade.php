@extends('layouts.amigo')

@section('css')
  <style>
    body {
      background-color: #9ad3bc;
    }

    .row {
      height: 100vh;
    }

    i {
      transform: rotate(-15deg);
    }

  </style>
@endsection

@section('content')
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-10 col-sm-8 col-md-6 col-lg-4">
        <div class="card">
          <div class="card-header">Amigo Logo</div>
          <div class="card-body p-4">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              {{-- 輸入信箱欄位 --}}
              <div class="mb-3">
                <label for="login-form__email" class="form-label">
                  <i class="fas fa-fw fa-envelope me-1"></i>
                  Email
                </label>
                <input id="login-form__email" type="email" class="form-control @error('email') is-invalid @enderror"
                  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              {{-- 輸入密碼欄位 --}}
              <div class="mb-3">
                <label for="login-form__password" class="form-label">
                  <i class="fas fa-fw fa-key me-1"></i>
                  密碼
                </label>
                <input id="login-form__password" type="password"
                  class="form-control @error('password') is-invalid @enderror" name="password" required
                  autocomplete="current-password">

                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              {{-- 記住我 --}}
              <div class="form-check d-flex justify-content-between mb-3 py-2">
                <div class="d-flex align-items-center">
                  <input class="form-check-input me-1" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                    <small>給我記住</small>
                  </label>
                </div>
                @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}">
                    <small>我忘記密碼了！</small>
                  </a>
                @endif
              </div>
              {{-- 按鈕 --}}
              <button type="submit" class="btn btn-primary w-100">登入</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

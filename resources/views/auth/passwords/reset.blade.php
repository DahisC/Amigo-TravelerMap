@extends('layouts.amigo')

@section('title')
  @parent
  確認重設密碼
@endsection

@section('css')
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Megrim&display=swap" rel="stylesheet">
  <style>
    body {
      background: url('images/sign-in.png') no-repeat center center;
      background-size: cover;
    }

    .container {
      height: 100vh;
    }

    /* i {
        transform: rotate(-15deg);
      } */

    .logo {
      font-family: 'Megrim', cursive !important;
      text-decoration: none;
    }

  </style>
@endsection


@section('nav')
  {{-- <div class="position-fixed w-100 text-center h1">
    <a class="logo text-secondary" href="/">Amigo</a>
  </div> --}}
@endsection

@section('content')
  <div class="container">
    <div class="row justify-content-center align-items-center h-100 ">
      <div class="col-10 col-sm-8 col-md-6 col-lg-5">
        <div class="card">
          <div class="card-header">{{ __('Reset Password') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
              @csrf

              <input type="hidden" name="token" value="{{ $token }}">

              <div class="form-outline mb-4">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                <label class="form-label" for="login-form__email">
                  <i class="fas fa-fw fa-envelope me-1"></i>
                  Email
                </label>

                <div class="col-md-6">

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>





              <div class="form-outline my-4">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="new-password">

                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
                <label class="form-label" for="login-form__password">
                  <i class="fas fa-fw fa-key me-1"></i>
                  Password
                </label>
              </div>


              <div class="form-outline my-4">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                  autocomplete="new-password">
                <label class="form-label" for="login-form__password">
                  <i class="fas fa-fw fa-key me-1"></i>
                  Confirm Password
                </label>
              </div>

              <button type="submit" class="btn btn-primary btn-block">
                {{ __('Reset Password') }}
              </button>


            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

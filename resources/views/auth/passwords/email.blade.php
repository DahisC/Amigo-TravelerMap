@extends('layouts.amigo')

@section('title')
@parent
重設密碼
@endsection

@section('nav')
{{-- <div class="position-fixed w-100 text-center h1">
    <a class="logo text-secondary" href="/">Amigo</a>
  </div> --}}
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

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-10 col-sm-8 col-md-6 col-lg-5">
            <div class="card p-4">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-outline mb-4">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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

                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Send Password Reset Link') }}
                        </button>
  
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

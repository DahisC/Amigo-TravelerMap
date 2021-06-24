@extends('layouts.backstage')

@section('page-content')
<div class="container-fluid">


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      {{-- <h6 class="m-0 font-weight-bold text-primary">Method -> UPDATE | Action -> {{ route('attractions.update', ['attraction' => $attraction->id]) }}</h6> --}}
      <h6 class="m-0 font-weight-bold text-primary mb-3">使用者 | {{isset($user) ? '編輯' :'新增'}}</h6>
      <div>
        @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </div>
    </div>

    <div class="card-body">
      <form action="{{ isset($user) ? route('backstage.users.update', ['user' => $user->id]) : route('backstage.users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($user))
        @method('PUT')
        @endif
        {{-- --}}
        <p class="text-primary">資訊 Info</p>
        <div class="mb-3">
          <label for="name" class="form-label">名稱 Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name ?? old('name') }}" />
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">信箱 Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email ?? old('email') }}" />
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">密碼 Password</label>
            <input type="password" class="form-control{{ $errors->has('password') ? '   is-invalid' : '' }}" id="password" name="password" required />
          </div>  
          @if ($errors->has('password'))
        <span class="invalid-feedback">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
      @endif       
          <div class="mb-3">
            <label for="name" class="form-label">確認密碼</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required />
          </div>
        {{-- --}}
        <button class="btn btn-outline-primary btn-block">{{isset($user) ? '編輯' :'建立'}}使用者</button>
      </form>
    </div>
  </div>
</div>
@endsection

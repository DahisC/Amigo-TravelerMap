
    <div class="form-group">
      <label for="">姓名</label>
      <input type="text" name="name"
      value="{{ old('name', optional($user ?? null)->name) }}"
      class="form-control{{ $errors->has('name') ? '   is-invalid' : '' }}" required>


      @if ($errors->has('name'))
        <span class="invalid-feedback">
          <strong>{{ $errors->first('name') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group">
      <label for="">信箱</label>
      <input type="email" name="email" type="email"
      value="{{ old('email', optional($user ?? null)->email) }}"
        class="form-control{{ $errors->has('email') ? '   is-invalid' : '' }}" required>

      @if ($errors->has('email'))
        <span class="invalid-feedback">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group">
      <label for="">密碼</label>
      <input type="password" name="password"
      class="form-control{{ $errors->has('password') ? '   is-invalid' : '' }}"       required>

      @if ($errors->has('password'))
        <span class="invalid-feedback">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group">
      <label for="">密碼重複輸入</label>
      <input type="password" name="password_confirmation" class="form-control" required>
    </div>

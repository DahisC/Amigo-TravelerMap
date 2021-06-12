
<div class="form-group">
  <label for="">姓名</label>
  <input type="text" name="name"
  value="{{ old('name', optional($map ?? null)->name) }}"
  class="form-control{{ $errors->has('name') ? '   is-invalid' : '' }}" required>


  @if ($errors->has('name'))
    <span class="invalid-feedback">
      <strong>{{ $errors->first('name') }}</strong>
    </span>
  @endif
</div>

<div class="form-group">
  <label for="">使用者ID</label>
  <input type="number" name="user_id"
  value="{{ old('user_id', optional($map ?? null)->user_id) }}"
    class="form-control{{ $errors->has('user_id') ? '   is-invalid' : '' }}" required>

  @if ($errors->has('user_id'))
    <span class="invalid-feedback">
      <strong>{{ $errors->first('user_id') }}</strong>
    </span>
  @endif
</div>

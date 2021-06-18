
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



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
    <label for="">網址</label>
    <input type="url" name="website"
    value="{{ old('website', optional($attraction ?? null)->website) }}"
      class="form-control{{ $errors->has('website') ? '   is-invalid' : '' }}" required>

    @if ($errors->has('website'))
      <span class="invalid-feedback">
        <strong>{{ $errors->first('website') }}</strong>
      </span>
    @endif
  </div>

  <div class="form-group">
    <label for="">電話</label>
    <input type="text" name="tel"
    value="{{ old('tel', optional($attraction ?? null)->tel) }}"
      class="form-control{{ $errors->has('tel') ? '   is-invalid' : '' }}" required>

    @if ($errors->has('tel'))
      <span class="invalid-feedback">
        <strong>{{ $errors->first('tel') }}</strong>
      </span>
    @endif
  </div>

  <div class="form-group">
    <label for="">description</label>
    <input type="text" name="description"
    value="{{ old('description', optional($attraction ?? null)->description) }}"
      class="form-control{{ $errors->has('description') ? '   is-invalid' : '' }}" required>

    @if ($errors->has('description'))
      <span class="invalid-feedback">
        <strong>{{ $errors->first('description') }}</strong>
      </span>
    @endif
  </div>

  
  <div class="form-group">
    <label for="">ticket_info</label>
    <input type="text" name="ticket_info"
    value="{{ old('ticket_info', optional($attraction ?? null)->ticket_info) }}"
      class="form-control{{ $errors->has('ticket_info') ? '   is-invalid' : '' }}" required>

    @if ($errors->has('ticket_info'))
      <span class="invalid-feedback">
        <strong>{{ $errors->first('ticket_info') }}</strong>
      </span>
    @endif
  </div>

  <div class="form-group">
    <label for="">traffic_info</label>
    <input type="text" name="traffic_info"
    value="{{ old('email', optional($attraction ?? null)->traffic_info) }}"
      class="form-control{{ $errors->has('traffic_info') ? '   is-invalid' : '' }}" required>

    @if ($errors->has('traffic_info'))
      <span class="invalid-feedback">
        <strong>{{ $errors->first('traffic_info') }}</strong>
      </span>
    @endif
  </div>

  <div class="form-group">
    <label for="">parking_info</label>
    <input type="text" name="traffic_info"
    value="{{ old('email', optional($attraction ?? null)->parking_info) }}"
      class="form-control{{ $errors->has('parking_info') ? '   is-invalid' : '' }}" required>

    @if ($errors->has('parking_info'))
      <span class="invalid-feedback">
        <strong>{{ $errors->first('parking_info') }}</strong>
      </span>
    @endif
  </div>

  <div class="form-group">
    <label for="">user_id</label>
    <input type="text" name="user_id"
    value="{{ old('user_id', optional($attraction ?? null)->user_id) }}"
      class="form-control{{ $errors->has('user_id') ? '   is-invalid' : '' }}" required>

    @if ($errors->has('user_id'))
      <span class="invalid-feedback">
        <strong>{{ $errors->first('user_id') }}</strong>
      </span>
    @endif
  </div>

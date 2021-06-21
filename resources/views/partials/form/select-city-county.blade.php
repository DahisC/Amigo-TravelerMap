<div id="city-county-selector" class="col-12 mb-3">
  <label for="search-form__input_range" class="form-label">位置</label>
  <div class="row">
    <div class="col-12 mb-3 d-none">
      <label for="search-form__input_range" class="form-label">
        <small>國家</small>
      </label>
      <select class="form-select" name="country" hidden></select>
    </div>
    <div class="col-6">
      <label for="search-form__input_range" class="form-label">
        <small>縣市</small>
      </label>
      <select id="select_city" class="form-select"></select>
    </div>
    <div class="col-6">
      <label for="search-form__input_range" class="form-label">
        <small>鄉鎮區</small>
      </label>
      <select id="select_area" class="form-select"></select>
    </div>
    <input id="zipcode" type="text" hidden />
  </div>
</div>

@prepend('stack-js')
<script src="{{ asset('js/twCitySelector.js') }}"></script>
<script>
  new TwCitySelector({
    el: '#city-county-selector',
    elCounty: '#select_city', // 在 el 裡查找 element
    elDistrict: '#select_area', // 在 el 裡查找 element
    elZipcode: '#zipcode', // 在 el 裡查找 element
    countyFieldName: 'region',
    districtFieldName: 'town'
  });
</script>
@endprepend

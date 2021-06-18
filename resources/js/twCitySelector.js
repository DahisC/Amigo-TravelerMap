window.TwCitySelector = require('tw-city-selector');

window.initTWCitySelector = () => {
  new TwCitySelector({
    el: '#city-county-selector',
    elCounty: '#select_city', // 在 el 裡查找 element
    elDistrict: '#select_area', // 在 el 裡查找 element
    elZipcode: '#zipcode', // 在 el 裡查找 element
    countyFieldName: 'region',
    districtFieldName: 'town'
  });
}

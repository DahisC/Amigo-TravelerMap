<a c class="btn btn-link btn-sm" type="button" id="dd-pin-to-map" data-mdb-toggle="dropdown" aria-expanded="false">
  <i class="fas fa-map-marked-alt text-secondary"></i>
</a>
<ul class="dropdown-menu text-dark" aria-labelledby="dd-pin-to-map">
  <li>
    <a class="dropdown-item disabled" href="#">
      加入至地圖
    </a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>
  @foreach ($userMaps as $map)
  <li>
    <a id="btn-instagram-share" class="dropdown-item d-flex justify-content-between align-items-center text-center" href="#">
      {{ $map->name }}
      <i class="fas fa-map-marker-alt"></i>
    </a>
  </li>
  @endforeach

</ul>

@push('stack-js')
<script>
  async function pinToMap(mapId, attractionId) {
    const result = await axios.patch('/maps/2/pin', {
      attractionId
    });
  }
</script>
@endpush

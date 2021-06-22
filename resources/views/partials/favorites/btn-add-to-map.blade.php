<a class="btn btn-outline-dark btn-sm add_map" href="#" data-id="{{ $f->id }}" role="button" onclick="pinToMap(null, {{ $f->id }})">
  <i class="fas fa-map-marked-alt"></i>
  加入至地圖
</a>

@push('stack-js')
<script>
  async function pinToMap(mapId, attractionId) {
    const result = await axios.patch('/maps/2/pin', {
      attractionId
    });
  }
</script>
@endpush

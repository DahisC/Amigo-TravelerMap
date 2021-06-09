<!-- Button trigger modal -->


<!-- Modal -->
<div class="fade modal" id="search-attraction-modal">
  <div class="modal-dialog modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">發現有趣的地點</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal2" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="search_form" method="GET" action="{{ route('maps.index') }}">
          <div class="container">
            <div class="row">
              <div class="col-12 mb-3">
                <!-- 距離 -->
                <label for="search-form__input_range" class="form-label">距離</label>
                <div class="range text-primary">
                  <input type="range" class="form-range" min="1" max="10" step="0.5" value="1"
                    id="search-form__input_range" onchange="range_displayer.textContent = this.value" name="range">
                </div>
                <div class="form-text text-end"><span id="range_displayer" class="me-1">1</span>公里內</div>
              </div>
              {{--  --}}
              @include('partials.form.select-city-county', ['defaultCity' => '', 'defaultArea' => ''])
              {{--  --}}
              <div class="col-12">
                <label for="search-form__input_range" class="form-label">標籤</label>
                <div class="input-group mb-3">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-mdb-toggle="dropdown">
                    標籤
                  </button>
                  <ul class="dropdown-menu">
                    @foreach ($tags->take(10) as $tag)
                      <li class="p-2"><a class="dropdown-item" href="#"
                          onclick="input_tag1.value = this.textContent">{{ $tag->name }}</a></li>
                    @endforeach
                  </ul>
                  <input id="input_tag1" type="text" class="form-control text-center" name="tag" />
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal2">取消</button>
        <button type="button" class="btn btn-primary" onclick="search_form.submit();">搜尋</button>
      </div>
    </div>
  </div>
</div>

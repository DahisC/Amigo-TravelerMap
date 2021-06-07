<!-- Button trigger modal -->


<!-- Modal -->
<div class="fade modal" id="search-attraction-modal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">搜尋景點</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal2" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          {{-- 距離 --}}
          <div class="mb-3">
            <label for="search-form__input_range" class="form-label">距離</label>
            <input type="range" class="form-range" min="1" max="10" step="0.5" value="1" id="search-form__input_range"
              onchange="range_displayer.textContent = this.value">
            <div class="form-text text-end"><span id="range_displayer" class="me-1">1</span>公里內</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal2">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

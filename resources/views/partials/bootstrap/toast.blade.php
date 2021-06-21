@if (Session::has('toast-test'))
<?php
    $toast = Session::get('toast-test');
?>
<div class="toast-container position-fixed p-3 bottom-0 end-0" id="toastPlacement">
  <div class="toast bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header bg-{{$toast['type']}} text-white">
      <strong class="me-auto">
        {{ $toast['header'] ?? '錯誤訊息' }}
      </strong>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      {{ $toast['body'] }}
    </div>
  </div>
</div>
@endif

<script>
  const hasToast = "{{ Session::has('toast-test') }}";
  if (hasToast) {
    const toastElList = [].slice.call(document.querySelectorAll('.toast'))
    const toastList = toastElList.map(function(toastEl) {
      return new bootstrap.Toast(toastEl)
    });
    toastList[0].show();
  }
</script>

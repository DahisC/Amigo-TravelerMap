@extends('layouts.backstage')

@section('css')
@endsection


@section('page-content')
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tables</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
      DataTables documentation</a>.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">景點 Attractions</h6>
      <h6 class="m-0 font-weight-bold text-primary">數量{{ $attractions->count() }}</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>名稱</th>
              <th>動作</th>
              <th>最後編輯時間</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>名稱</th>
              <th>動作</th>
              <th>最後編輯時間</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($attractions->take(10) as $a)
            <tr>
              <td>{{ $a->id }}</td>
              <td>{{ $a->name }}</td>
              <td>
                <a href="{{ route('attractions.show', ['attraction' => $a->id]) }}" target="_blank" class="btn btn-info btn-circle btn-sm">
                  <i class="fas fa-external-link-alt"></i>
                </a>
                <a href="{{ route('backstage.attractions.edit', ['attraction' => $a->id]) }}" class="btn btn-warning btn-circle btn-sm">
                  <i class="fas fa-pen"></i>
                </a>

                <a class="btn btn-danger btn-circle btn-sm" href="#" onclick="event.preventDefault();
                  document.getElementById('destroy_form_{{ $a->id }}').submit();">
                  <i class="fas fa-pen"></i>
                </a>

                <form id="destroy_form_{{ $a->id }}" action="{{ route('attractions.destroy', ['attraction' => $a->id]) }}" method="POST" class="d-none">
                  @csrf
                  @method('DELETE')
                </form>
              </td>
              <td>{{ $a->updated_at }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
@endsection


@section('js')
<script>
  // window.onload = () => {
  //   document.querySelectorAll('.delete-btn').forEach(function(btn) {
  //     btn.addEventListener('click', function() {

  //       const id = this.getAttribute('data-id');
  //       if (confirm('是否刪除')) {
  //         document.querySelector(id).submit();
  //       }
  //     });
  //   })
  // }
</script>
@endsection
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
    {{-- 這邊我加d-flex justify-content-between --}}
    <div class="card-header py-3 d-flex justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">地圖 Maps</h6>
      <h6 class="m-0 font-weight-bold text-primary">數量{{ $maps->count() }}</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>建立者</th>
              <th>名稱</th>
              <th>動作</th>
              <th>最後編輯時間</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>user_id</th>
              <th>名稱</th>
              <th>動作</th>
              <th>最後編輯時間</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($maps as $a)
            <tr>
              <td>{{ $a->id }}</td>
              <td>{{ $a->user_id }}</td>
              <td>{{ $a->name }}</td>
              <td>
                <a href="{{ route('maps.show', ['map' => $a->id]) }}" target="_blank" class="btn btn-info btn-circle btn-sm">
                  <i class="fas fa-external-link-alt"></i>
                </a>
                <a href="{{ route('backstage.maps.edit', ['map' => $a->id]) }}" class="btn btn-warning btn-circle btn-sm">
                  <i class="fas fa-pen"></i>
                </a>
                <a class="btn btn-danger btn-circle btn-sm" onclick="event.preventDefault();
                document.getElementById('delete_form_{{ $a->id }}').submit();">
                  <i class="fas fa-trash"></i>
                </a>
                <form id="delete_form_{{ $a->id }}" action="{{ route('backstage.maps.destroy', ['map' => $a->id]) }}" method="POST" class="d-none">
                  @csrf
                  @method('DELETE')
                </form>
              </td>
              <td>{{ $a->updated_at }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$maps->links()}}
      </div>
    </div>
  </div>

</div>
@endsection

@section('js')
@endsection
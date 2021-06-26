@extends('layouts.backstage')

@section('css')
@endsection

@section('page-content')
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">地圖 Maps</h1>
  <p class="mb-4">
    地圖是網站所有使用者都能建立的資源。
  </p>
  <p class="mb-4">
    透過在網站中建立地圖，你可以地點（Attractions）分門別類地放進你建立的地圖中；<br />
    並且也可以將地圖的網址分享給其它旅人，讓它們看看你規劃的行程有多棒！
  </p>
  <p class="mb-4">
    <a href="#" class="btn btn-warning btn-circle btn-sm">
      <i class="fas fa-pen"></i>
    </a>
    <span class="align-middle">可變更地圖名稱</span>
  </p>
  <p class="mb-4">
    <a href="#" target="_blank" class="btn btn-info btn-circle btn-sm">
      <i class="fas fa-external-link-alt"></i>
    </a>
    <span class="align-middle">可在地圖介面中編輯地圖，並把地點（Attractions）加入地圖中</span>
  </p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    {{-- 這邊我加d-flex justify-content-between --}}
    <div class="card-header py-3 d-flex justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">地圖列表</h6>
      <h6 class="m-0 font-weight-bold text-primary">資料筆數 {{ $maps->count() }}</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              @can('view-admin')
              <th>ID</th>
              <th>建立者</th>
              @endcan
              <th>名稱</th>
              <th>動作</th>
              <th>最後編輯時間</th>
            </tr>
          </thead>
          {{-- <tfoot>
            <tr>
              <th>ID</th>
              <th>user_id</th>
              <th>名稱</th>
              <th>動作</th>
              <th>最後編輯時間</th>
            </tr>
          </tfoot> --}}
          <tbody>
            @foreach ($maps as $a)
            <tr>
              @can('view-admin')
              <td>{{ $a->id }}</td>
              <td>{{ $a->user_id }}</td>
              @endcan
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

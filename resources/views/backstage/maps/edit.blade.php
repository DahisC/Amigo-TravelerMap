<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<form method="POST" action="{{ route('backstage.maps.update',['map'=>$map->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('backstage.maps.form')
    <button type="submit" class="btn btn-primary btn-block">送出</button>
</form>
<script src="{{ asset('css/app.css') }}"></script>
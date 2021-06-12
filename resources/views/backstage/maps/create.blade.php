<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<form method="POST" action="{{ route('backstage.maps.store') }}" enctype="multipart/form-data">
    @csrf
    @include('backstage.maps.form')
    <button type="submit" class="btn btn-primary btn-block">送出</button>
</form>
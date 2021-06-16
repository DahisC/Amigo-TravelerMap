@extends('layouts.backstage')

@section('page-content')
<form method="POST" action="{{ route('backstage.maps.store') }}" enctype="multipart/form-data">
    @csrf
    <label for="name" class="form-label" >名稱 Name</label>
    <input type="text" class="form-control" id="name" name="name" />
    <button type="submit" class="btn btn-primary btn-block">送出</button>
</form>
@endsection
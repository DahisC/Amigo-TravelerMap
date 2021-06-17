

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<form method="POST" action="{{ route('backstage.users.update',['user'=>$user->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('backstage.users.form')
    <button type="submit" class="btn btn-primary btn-block">送出修改</button>
</form>
<script src="{{ asset('css/app.css') }}"></script>
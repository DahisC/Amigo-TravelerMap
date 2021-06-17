<form method="POST" action="{{ route('backstage.users.store') }}" enctype="multipart/form-data">
    @csrf
    @include('backstage.users.form')
    <button type="submit" class="btn btn-primary btn-block">送出</button>
</form>
<script src="{{ asset('css/app.css') }}"></script>
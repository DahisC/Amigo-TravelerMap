
<form method="POST" action="{{ route('backstage.attractions.store') }}" enctype="multipart/form-data">
    @csrf
    @include('backstage.attractions.form')
    <button type="submit" class="btn btn-primary btn-block">送出</button>
</form>
<div class="container">
    @foreach ($users as $user)
        {{ $user->name }}
        <a href="{{ route('backstage.users.edit',[ 'user'=>$user->id]) }}">
            <button>編輯</button>
        </a> <br>
    @endforeach
</div>


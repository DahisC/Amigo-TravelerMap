@foreach ( $maps->take(10) as $map )
    {{ $map }}
    <a href="{{ route('backstage.maps.edit',[ 'map'=>$map->id]) }}">
        <button>編輯</button>
    </a> <br>
@endforeach
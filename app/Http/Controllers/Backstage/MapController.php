<?php

namespace App\Http\Controllers\Backstage;

use App\Map;
use App\Http\Requests\MapRequest;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Gate;

class MapController extends Controller
{
    public function index()
    {
        

        $maps = Map::get();
        return view('backstage.maps.index', compact('maps'));
    }

    public function create()
    {
        return view('backstage.maps.create');
    }

    public function store(MapRequest $request)
    {
        Map::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name
        ]);
        return redirect()->route('backstage.maps.index');
    }

    public function edit(Map $map)
    {
        return view('backstage.maps.edit', compact('map'));
    }

    public function update(MapRequest $request, Map $map)
    {

        $map->update($request->all());
        return redirect()->route('backstage.maps.index');
    }

    public function destroy(Map $map)
    {
        $map->attractions()->detach();
        $map->delete();
        return redirect()->route('backstage.maps.index');
    }
}

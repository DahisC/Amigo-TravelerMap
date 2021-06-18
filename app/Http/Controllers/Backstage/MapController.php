<?php

namespace App\Http\Controllers\Backstage;

use App\Map;
use App\User;
use App\Http\Requests\MapRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MapController extends Controller
{
    public function index()
    {
        $map = Map::get();
        return view('backstage.maps.index', compact('maps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function create()
    // {
    //     return view('backstage.maps.create');
    // }
    public function create(User $user)
    {
        dd($user);

        if($user->can('create',map::class)){
          dd('true');
          }
        dd('fail');

        return view('backstage.maps.factory');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        return view('backstage.maps.factory', compact('map'));
    }

    public function update(MapRequest $request,Map $map)
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

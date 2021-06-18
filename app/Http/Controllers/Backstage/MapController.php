<?php

namespace App\Http\Controllers\Backstage;

use App\Map;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests\MapRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MapController extends Controller
{
    public function index()
    {
        $maps = Map::get();
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
    public function create(Request $request)
    {
        if($request->user()->can('create',map::class)){
            return view('backstage.maps.factory');
        }
        dd('true');
        dd('fail');
        return redirect()->route('backstage.maps.index');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MapRequest $request)
    {
        if($request->user()->can('store',map::class)){
            Map::create([
                'user_id' => auth()->user()->id,
                'name' => $request->name
            ]);
        }

        return redirect()->route('backstage.maps.index');
    }

    public function edit(Map $map)
    {
        // dd($map);

        return view('backstage.maps.factory', compact('map'));
    }

    public function update(MapRequest $request,Map $map,User $user)
    {
        dd(123,$user, Auth::user());
        Auth::user();

        if($request->can('update',map::class)){
          dd('true');
          }
        dd('fail');

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

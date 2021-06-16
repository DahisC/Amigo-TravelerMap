<?php

namespace App\Http\Controllers\Backstage;

use App\Map;
use App\Http\Controllers\Controller;
use App\Http\Requests\MapRequest;

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
    public function create()
    {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function edit($id) 
    // {
    //     $map = Map::findOrFail($id);
    //     return view('backstage.maps.edit',compact('map'));
    // }


    
    // public function edit(Map $map)
    // {
    //     return view('backstage.maps.edit',compact('map'));
    // }


    public function edit(Map $map)
    {

        return view('backstage.maps.factory',compact('map'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MapRequest $request, $id)
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

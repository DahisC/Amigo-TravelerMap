<?php

namespace App\Http\Controllers;

use App\Map;
use App\Tag;
use App\helpers;
use App\Attraction;
use Illuminate\Http\Request;
use App\Http\Requests\MapRequest;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        $tag = $request->tag;
        $region = $request->region;
        $town = $request->town;
        $area = $request->area;


        if ($request->area) {
            $area = helpers::getAttrLatLng($area);
            $areaLat = $area->results[0]->geometry->location->lat;
            $areaLng = $area->results[0]->geometry->location->lng;
            $attractions = Attraction::queryNearbyAttractions($areaLat, $areaLng)->with('position', 'images', 'tags')->get();
            dd($attractions);
            //when
        } else if ($request->tag) {
            $attractions = Attraction::QueryTags($tag)->with(['tags', 'position', 'images'])->get();
        } else if ($request->region) {
            $attractions = Attraction::QueryRegion($region)->with(['tags', 'position', 'images'])->get();
        } else if ($request->town) {
            $attractions = Attraction::QueryTown($town)->with(['tags', 'position', 'images'])->get();
        } else if ($request->region && $request->town) {
            $attractions = Attraction::QueryTown($town)->QueryRegion($region)->with(['tags', 'position', 'images'])->get();
        } else if ($request->tag && $request->region && $request->town) {
            $attractions = Attraction::QueryTags($tag)->QueryTown($town)->QueryRegion($region)->with(['tags', 'position', 'images'])->get();
        } else {
            $attractions = Attraction::with('tags', 'position', 'images')->inRandomOrder()->take(100)->get();
        }
        $tags = Tag::get();
        return view('maps.index', compact('attractions', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maps.factory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MapRequest $request)
    {
        $map = Map::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
        ]);
        return redirect()->route('maps.show', ['map' => $map->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('test2');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = 'Edit';
        return view('maps.factory', compact('action'));
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
        if ($request->name) {
            $map = Map::findOrFail($id);
            $map->update([
                'name' => $request->name,
            ]);
        };


        return redirect()->route('maps.show', ['map' => $map->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $map = Map::find($id);
        $map->attractions()->sync([]);
        $map->delete();
    }
}

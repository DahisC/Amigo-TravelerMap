<?php

namespace App\Http\Controllers;

use App\Map;
use App\Tag;
use Exception;
use App\helpers;
use App\Attraction;
use Illuminate\Http\Request;
use App\Http\Requests\MapRequest;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = Tag::get();

        $query = Attraction::query()->with('tags', 'position', 'images');
        switch ($request->searchBy) {
            case 'area':
                $addressLatLng = helpers::getAddressLatLng($request->q);
                $query->queryNearbyAttractions($addressLatLng['lat'], $addressLatLng['lng'], $request->range);
                break;
            case 'address':
                if ($request->region) $query->QueryRegion($request->region);
                if ($request->town) $query->QueryTown($request->town);
                break;
            default:
                break;
        }
        if ($request->tag) $query->QueryTags($request->tag);
        $attractions = $query->get();
        $addressLatLng = '';
        return view('maps.index', compact('attractions', 'tags', 'addressLatLng'));
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
        $map = Map::findOrFail($id);
        $map->attractions()->sync([]);
        $map->delete();
    }
}

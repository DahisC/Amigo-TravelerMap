<?php

namespace App\Http\Controllers;

use App\Map;
use App\Tag;
use App\User;
use App\helpers;
use App\Attraction;
use Illuminate\Http\Request;
use App\Http\Requests\MapRequest;

class MapController extends Controller
{
    public function index(Request $request)
    {
        $userFavorites = User::favorites();
        $tags = Tag::get();
        $addressLatLng = null;
        $query = Attraction::query()->with('tags', 'position', 'images');
        switch ($request->searchBy) {
            case 'area':
                $addressLatLng = helpers::getAddressLatLng($request->q);
                $query->queryNearbyAttractions($addressLatLng['lat'], $addressLatLng['lng'], $request->range);
                $attractions = $query->get();
                break;
            case 'address':
                if ($request->region) $query->QueryRegion($request->region);
                if ($request->town) $query->QueryTown($request->town);
                $attractions = $query->get();
                break;
            default:
                $addressLatLng = null;
                $attractions = [];
                break;
        }

        if ($request->tag) $query->QueryTags($request->tag);
        return view('maps.index', compact('attractions', 'addressLatLng', 'userFavorites'));
    }

    public function create()
    {
        return view('maps.factory');
    }

    public function store(MapRequest $request)
    {
        $map = Map::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
        ]);
        return redirect()->route('maps.show', ['map' => $map->id]);
    }

    public function show(Map $map)
    {
        dd($map->with('attractions')->first());
        return view('test2');
    }

    public function edit($id)
    {
        $action = 'Edit';
        return view('maps.factory', compact('action'));
    }

    public function update(MapRequest $request, Map $map)
    {
        if ($request->name) {
            $map->update([
                'name' => $request->name,
            ]);
        };
        return redirect()->route('maps.show', ['map' => $map->id]);
    }

    public function destroy(Map $map)
    {
        $map->attractions()->detach();
        $map->delete();
    }
}

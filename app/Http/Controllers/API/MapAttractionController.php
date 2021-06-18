<?php

namespace App\Http\Controllers\API;

use App\Map;
use App\Attraction;
use GuzzleHttp\Client;
use App\AttractionImage;
use App\AttractionPosition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttractionRequest;

class MapAttractionController extends Controller
{
    public function update(Request $request, $id)
    {
        //delete create
        $map = Map::findOrFail($id);
        $attraction = Attraction::findOrFail($request->id);
        $map->attractions()->syncWithoutDetaching($attraction);

        return ['map' => $map];
    }

    public function destroy(Request $request, $id)
    {
        $map = Map::findOrFail($id);
        $attraction = Attraction::findOrFail($request->id);
        $map->attractions()->detach($attraction);

        return ['map' => $map];
    }
}

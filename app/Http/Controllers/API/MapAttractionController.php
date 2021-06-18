<?php

namespace App\Http\Controllers\API;

use App\Map;
use App\Attraction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MapAttractionController extends Controller
{
    public function update(Request $request,Map $map)
    {
        //delete create
        
        $attraction = Attraction::findOrFail($request->id);
        $map->attractions()->syncWithoutDetaching($attraction);

        return ['map'=>$map];
    }

    public function destroy(Request $request,Map $map)
    {
        $attraction = Attraction::findOrFail($request->id);
        $map->attractions()->detach($attraction);

        return ['map'=>$map];
    }
}

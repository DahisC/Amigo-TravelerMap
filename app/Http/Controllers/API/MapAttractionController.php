<?php

namespace App\Http\Controllers\API;

use App\Map;
use App\Attraction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MapAttractionController extends Controller
{
    public function update(Request $request, $id)
    {
        //delete create
        //第一個大雷  
        $attraction = Attraction::findOrFail($request->attraction_id);
        $has = Map::where('id', $id)->whereHas('attractions', function ($query) use ($attraction) {
            $query->where('attraction_id', $attraction->id);
        })->get()->count();

        //第二不能在上面宣告 會被 $map->whereHas改變
        $map = Map::find($id);
        if (!$has) $map->attractions()->attach($attraction);
        else $map->attractions()->detach($attraction);

        return ['map' => $map];
    }
}

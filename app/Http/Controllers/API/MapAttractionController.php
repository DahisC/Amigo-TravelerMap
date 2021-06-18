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
        $map = Map::findOrFail($id);
        $attraction = Attraction::findOrFail($request->attraction_id);
        //重點 用數量去判斷
        //我猜測關聯表的主key 不是id 所以會不知道找去哪
        $has = Map::where('id',$id)->whereHas('attractions', function ($query) use ($attraction) {
            $query->where('attraction_id', $attraction->id);
        })->get()->count();
        // dd($has);
        if (!$has) $map->attractions()->attach($attraction);
        else $map->attractions()->detach($attraction);

        return ['map' => $map];
    }
}

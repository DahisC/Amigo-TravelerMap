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
        $user = Auth::user();
        if(Gate::allows('viewAny',Map::class)){
            if($user->role == "Admin"){
                $maps = Map::get();
                return view('backstage.maps.index',compact('maps'));
            }else{
                $maps = Map::where('user_id',$user->id)->get();
                return view('backstage.maps.index',compact('maps'));
            }
        }
        return view('backstage.index', compact('maps'));
    }

    public function create()
    {
        if ($this->authorize('viewAny', map::class)) {
            return view('backstage.maps.factory');
        }
        return redirect()->route('backstage.maps.index');
    }

    public function store(MapRequest $request)
    {
        if ($this->authorize('viewAny', map::class)) {
            Map::create([
                'user_id' => auth()->user()->id,
                'name' => $request->name
            ]);
        }
        return redirect()->route('backstage.maps.index');   // 發送火箭以加入新的地圖！一起來冒險吧！
    }

    public function edit(Map $map)
    {
        if ($this->authorize('update', $map)){
            return view('backstage.maps.factory', compact('map'));
        }
        return redirect()->route('backstage.maps.index');   // 發送火箭以加入新的地圖！一起來冒險吧！
    }

    public function update(Request $request, Map $map)
    {
        if ($this->authorize('update', $map)) {
            $map->update($request->all());
            return redirect()->route('backstage.maps.index');
        }
        return redirect()->route('backstage.maps.index');   // 發送火箭以加入新的地圖！一起來冒險吧！
    }

    public function destroy(Map $map)
    {
        if ($this->authorize('update', $map)) {
            $map->attractions()->detach();
            $map->delete();
            return redirect()->route('backstage.maps.index');
        }
        return redirect()->route('backstage.maps.index');   // 發送火箭以加入新的地圖！一起來冒險吧！
    }
}

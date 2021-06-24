<?php

namespace App\Http\Controllers;

use App\Map;
use App\Tag;
use App\User;
use App\helpers;
use App\Attraction;
use App\Mail\Itineraries;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use App\Http\Requests\MapRequest;
use Illuminate\Support\Facades\Mail;

class MapController extends Controller
{
    public function index(Request $request)
    {
        $userFavorites = User::favorites();
        $tags = Tag::get();
        $addressLatLng = null;
        $query = Attraction::query()->with('tags', 'position', 'images', 'time');
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

    public function show($id)
    {
        $map = Map::with('user')->find($id);
        $mapAttractions = Attraction::with('tags', 'position', 'images')->whereHas('maps', function ($q) use ($id) {
            $q->where('map_id', $id);
        })->get();
        $userFavorites = User::favorites();
        $addressLatLng = null;
        return view('maps.index', [
            'map' => $map,
            'attractions' => $mapAttractions,
            'userFavorites' => $userFavorites,
            'addressLatLng' => $addressLatLng,
        ]);
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
    public function pin(Request $request, $id)
    {
        //第一不能用find
        $attraction = Attraction::findOrFail($request->attractionId);
        $isPinned = Map::where('id', $id)->whereHas('attractions', function ($query) use ($attraction) {
            $query->where('attraction_id', $attraction->id);
        })->get()->count();

        //第二不能在上面宣告 會被 $map->whereHas改變
        $map = Map::find($id);
        if (!$isPinned) $map->attractions()->attach($attraction);
        else $map->attractions()->detach($attraction);

        return response(['result' => $isPinned ? 'pinned' : 'removed']);
    }
    public function generateItineraries($mapId)
    {
        if (auth()->check())  $user = auth()->user();
        else $user = null;
        $map = Map::with([
            'attractions',
            'attractions.position'
        ])->whereHas('attractions', function ($query) use ($mapId) {
            $query->where('map_id', $mapId);
        })->get()->first();

        Mail::send(new Itineraries($map, $user));

        $markdown = new Markdown(view(), config('mail.markdown'));
        return $markdown->render('emails.Itineraries', compact('map', 'user'));
        // Mail::send(new amigo_map($all));
        // return redirect()->route('sign-in');
    }
    // public function watch()
    // {
    //     // ->setOptions(['defaultFont' => 'sans-serif'])
    //     $pdf = PDF::loadView('emails.PDF');
    //     return $pdf->stream();
    //     // return $pdf->download('amigo.pdf');
    // }
    // public function pdfOutput()
    // {
    //     $userFavorites = User::with([
    //         'attractions',
    //         'attractions.position',
    //     ])->findOrFail(auth()->user()->id);
    //     Mail::send(new amigo_map($userFavorites));
    // }
}

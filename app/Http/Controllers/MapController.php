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
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'generateItineraries');
    }

    public function index(Request $request)
    {
        $user = auth()->user() ?? null;
        $map = null;
        $mapAttractions = [];
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
                if ($request->region) $query->queryRegion($request->region);
                if ($request->town) $query->queryTown($request->town);
                $attractions = $query->get();
                break;
            default:
                $addressLatLng = null;
                $attractions = [];
                break;
        }
        if ($request->tag) $query->queryTags($request->tag);
        return view('maps.index', compact('attractions', 'addressLatLng', 'userFavorites', 'map', 'mapAttractions', 'user'));
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
        $user = auth()->user() ?? null;
        $attractions =  Attraction::with('tags', 'position', 'images', 'time')->take(10)->get();
        $map = Map::with('user', 'attractions')->find($id);
        $mapAttractions = $map->attractions->pluck('id');
        // $mapAttractions = Attraction::with('tags', 'position', 'images')->whereHas('maps', function ($q) use ($id) {
        //     $q->where('map_id', $id);
        // })->get();
        $userFavorites = User::favorites();
        $addressLatLng = null;
        return view('maps.index', [
            'map' => $map,
            'mapAttractions' => $mapAttractions,
            'userFavorites' => $userFavorites,
            'addressLatLng' => $addressLatLng,
            'attractions' => $attractions,
            'user' => $user
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
        $attraction = Attraction::findOrFail($request->attractionId);
        $isPinned = Map::where('id', $id)->whereHas('attractions', function ($query) use ($attraction) {
            $query->where('attraction_id', $attraction->id);
        })->get()->count();

        $map = Map::with('attractions')->find($id);
        if (!$isPinned) $map->attractions()->attach($attraction);
        else $map->attractions()->detach($attraction);
        $mapAttractions = Map::with('attractions')->find($id)->attractions->pluck('id'); // 如果使用 $map-> 會取得更新前的舊陣列
        return compact('mapAttractions');
    }
    public function generateItineraries($mapId)
    {
        if ($mapId === 1) $this->middleware('auth')->except('generateItineraries');

        if (auth()->check()) $user = auth()->user();
        else $user = User::find(1);
        $map = Map::with([
            'attractions',
            'attractions.position'
        ])->whereHas('attractions', function ($query) use ($mapId) {
            $query->where('map_id', $mapId);
        })->get()->first();

        Mail::send(new Itineraries($map, $user));

        $markdown = new Markdown(view(), config('mail.markdown'));
        return $markdown->render('emails.itineraries', compact('map', 'user'));
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

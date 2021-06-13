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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttractionRequest $request)
    {
        //地點轉Px、Py
        $attraction = Attraction::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'website' => $request->website,
            'tel' => $request->tel,
            'description' => $request->description,
            'ticket_info' => $request->ticket_info,
            'traffic_info' => $request->traffic_info,
            'parking_info' => $request->parking_info,
        ]);
        //position
        $attraction->position()->save(
            AttractionPosition::make([
                'country' => $request->country,
                'region' => $request->region,
                'town' => $request->town,
                'address' => $request->address,
                'lat' => '25.017525',
                'lng' => '121.533162',
            ])
        );
        //img
        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('attractions');
            $attraction->images()->save(
                AttractionImage::make([
                    'url' => $path,
                    // 'image_desc' => '112',
                ])
            );
        };

        return redirect()->route('backstage.attractions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //delete create
        $map = Map::findOrFail($id);
        $attraction = Attraction::findOrFail($request->id);
        $map->attractions()->syncWithoutDetaching($attraction);

        return ['map' => $map];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $map = Map::findOrFail($id);
        $attraction = Attraction::findOrFail($request->id);
        $map->attractions()->detach($attraction);

        return ['map' => $map];
    }
}

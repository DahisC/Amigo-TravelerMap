<?php

namespace App\Http\Controllers\Backstage;
use App\helpers;
use App\Attraction;
use GuzzleHttp\Client;
use App\AttractionImage;
use App\AttractionPosition;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AttractionRequest;

class AttractionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attractions = Attraction::get()->take(10);
        return view('backstage.attractions.index', compact('attractions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backstage.attractions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttractionRequest $request)
    {
        // 地點轉Px、Py
        $response = helpers::getAttrLatLng($request);
        // dd($response->results[0]->geometry->location->lat);
        
        $attraction = Attraction::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'website' => $request->website,
            'tel' => $request->tel,
            'description' => $request->description,
            'ticket_info' => $request->ticket_info ?? '',
            'traffic_info' => $request->traffic_info ?? '',
            'parking_info' => $request->parking_info ?? '',
        ]);
        //position
        $attraction->position()->save(
            AttractionPosition::make([
                'country' => $request->country,
                'region' => $request->region,
                'town' => $request->town,
                'address' => $request->address,
                'lat' =>  $response->results[0]->geometry->location->lat,
                'lng' => $response->results[0]->geometry->location->lng,
            ])
        );
        //img
        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('attractions');
            $attraction->images()->save(
                AttractionImage::make([
                    'url' => $path,
                    'image_desc' => $request->image_desc ?? '',
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attraction = Attraction::findOrFail($id);
        return view('backstage.attractions.edit', compact('attraction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttractionRequest $request, $id)
    {
        $attraction = Attraction::findOrFail($id);
        $attraction->update($request->all());
        $attraction->position->update($request->all());

        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('attractions');
            AttractionImage::updateOrCreate([
                'attraction_id' => $attraction->id,
                'url' => $path,
            ], [
                'image_desc' => $request->image_desc ?? '',
            ]);
        };


        return redirect()->route('backstage.attractions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attraction = Attraction::findOrFail($id);
        $attraction->delete();
        $attraction->position->delete();
        //開始刪img model跟圖片

        $attraction->images->each(function ($img) {
            Storage::delete($img->url);
            $img->delete();
        });
        return redirect()->route('backstage.attractions.index');
    }
}

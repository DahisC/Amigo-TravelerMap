<?php

namespace App\Http\Controllers;

use App\Attraction;
use GuzzleHttp\Client;
use App\AttractionImage;
use App\AttractionPosition;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AttractionRequest;
use App\Http\Requests\CreateActivitiesRequest;


class AttractionController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

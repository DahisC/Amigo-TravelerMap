<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\CreateActivitiesRequest;
use Illuminate\Support\Facades\Storage;

use GuzzleHttp;


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
    public function store(CreateActivitiesRequest $request)
    {
        //地點轉Px、Py
        // $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
        //     'language' => 'zh-TW',
        //     'address' => $request->address,
        //     'key' => 'AIzaSyDzlrWxUgqiX2s22EHfVBdtRmWCj2c77g4',
        // ]);
        $client = new \GuzzleHttp\Client();
        $request = $client->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json', [
            'language' => 'zh-TW',
            'address' => '中興大學',
            'key' => 'AIzaSyDzlrWxUgqiX2s22EHfVBdtRmWCj2c77g4',
        ]);
        $response = $request->getBody();

        
        dd($response);
        // dd($response.json_encode());

        dd($request->all());

        // Storage::
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

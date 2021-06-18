<?php

namespace App\Http\Controllers\API;

use App\Attraction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttractionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->lat && $request->lng) {
            $attractions = Attraction::queryNearbyAttractions($request->lat, $request->lng, 3)->with('position', 'images', 'tags')->get();
        } else {
            $attractions = Attraction::with('tags', 'position', 'images')->inRandomOrder()->take(100)->get();
        }
        return response(compact('attractions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class AttractionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->only(['favorite']); // 使用者在請求 favorite 時需要驗證身分
    }
    public function index(Request $request)
    {
        // $userFavorites = User::with('attractions')->find('id', auth()->user()->id)->attractions;
        // dd($userFavorites);
        // if ($request->lat && $request->lng) {
        //     $attractions = Attraction::queryNearbyAttractions($request->lat, $request->lng, 3)->with('position', 'images', 'tags')->get();
        // } else {
        //     $attractions = Attraction::with('tags', 'position', 'images')->inRandomOrder()->take(100)->get();
        // }
        // return response(compact('attractions', 'userFavorites'));
    }

    public function favorite($id)
    {
        dd($id, auth()->user());
        // dd(Session::all());
        // dd($id, auth()->user()->name, auth('api')->user());
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Attraction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AttractionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->lat && $request->lng) {
            $attractions = Attraction::queryNearbyAttractions($request->lat, $request->lng, 3)->with('position', 'images', 'tags')->get();
        } else {
            $attractions = Attraction::with('tags', 'position', 'images')->inRandomOrder()->take(100)->get();
        }
        return response(compact('attractions'));
    }

    public function favorite($id)
    {
        dd($id, auth()->user(), auth()->guard('api')->user());
    }
}

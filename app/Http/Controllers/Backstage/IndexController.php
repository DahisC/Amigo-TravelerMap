<?php

namespace App\Http\Controllers\backstage;

use App\Attraction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $putAttraction = Attraction::where('user_id', auth()->user()->id)->count();
        return view('backstage.index', [
            'put' => $putAttraction,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class FavoriteController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $userFavorites = User::with([
                'attractions',
                'attractions.images',
                'attractions.position',
                'attractions.time',
                'attractions.tags'
            ])->findOrFail(auth()->user()->id)->attractions->paginate(10);
            return view('favorites.index', compact('userFavorites'));
        }
    }
}

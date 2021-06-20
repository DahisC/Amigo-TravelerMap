<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $userFavorites = User::with('attractions')->findOrFail(auth()->user()->id)->attractions;
            return view('favorites.index', compact('userFavorites'));
        }
    }
}

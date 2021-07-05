<?php

namespace App\Http\Controllers;

use App\User;
use App\Attraction;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $userFavorites = User::favorites();
        if ($request->search) {
            $userFavorites = Attraction::keyWord($request->search,$userFavorites);
        };

        $userFavorites->paginate(10);
        $maps = auth()->user()->maps;
        return view('favorites.index', compact('userFavorites', 'maps'));
        // Session::flash('toast-test', collect(['type' => 'danger', 'header' => '權限不足', 'body' => '測試']));
    }
}

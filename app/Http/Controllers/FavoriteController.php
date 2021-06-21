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
        Session::flash('toast-test', collect(['type' => 'danger', 'header' => '權限不足', 'body' => '測試']));
        if (Gate::allows('viewAny', Attraction::class)) {

            if (auth()->check()) {
                $userFavorites = User::with([
                    'attractions',
                    'attractions.images',
                    'attractions.position',
                    'attractions.time',
                    'attractions.tags'
                ])->findOrFail(auth()->user()->id)->attractions->paginate(10);
                return view('favorites.index', compact('userFavorites'));
            } else {
                return redirect()->route('sign-in');
            }
        }
    }
}

<?php

namespace App\Http\Controllers\Backstage;

use App\Tag;
use App\User;
use App\Attraction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;


class AttractionController extends Controller
{
    public function index()
    {
        if (Gate::allows('view',Attraction::class)) {
            // dd('view');
            $attractions = Attraction::get();
            return view('backstage.attractions.index', compact('attractions'));
        }
        return view('backstage.index'); //很抱歉，您的權限不足，發送火箭享尊榮服務
    }

    public function create()
    {
        if (Gate::allows('view',Attraction::class)) {
            $tags = Tag::get();
            return view('backstage.attractions.factory', compact('tags'));
        }
        return view('backstage.index'); //很抱歉，您的權限不足，發送火箭享尊榮服務
    }

    public function edit(Attraction $attractions)
    {
        // dd($request,$attractions);
        if ($this->authorize('update',$attractions)) {
            // dd('ddd');
            $attraction = Attraction::with('tags', 'images', 'position')->find($attractions->id);
            $tags = Tag::get();
            return view('backstage.attractions.factory', compact('attraction', 'tags'));
        }
        return view('backstage.index'); //很抱歉，您的權限不足，發送火箭享尊榮服務
    }
}

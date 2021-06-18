<?php

namespace App\Http\Controllers\Backstage;


use App\Tag;
use App\Attraction;
use App\Http\Controllers\Controller;


class AttractionController extends Controller
{
    public function index()
    {
        $attractions = Attraction::get();
        return view('backstage.attractions.index', compact('attractions'));
    }

    public function create()
    {
        $tags = Tag::get();
        return view('backstage.attractions.factory', compact('tags'));
    }

    public function edit($id)
    {
        $attraction = Attraction::with('tags', 'images', 'position')->find($id);
        $tags = Tag::get();
        return view('backstage.attractions.factory', compact('attraction', 'tags'));
    }
}

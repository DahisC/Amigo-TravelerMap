<?php

namespace App\Http\Controllers\Backstage;

use App\User;
use App\Tag;
use App\Attraction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AttractionRequest;

class AttractionController extends Controller
{
    static function ifTraveler()
    {
        dump(111);
        
        if (Gate::allows('Traveler')) {
            dump(222);
            dd(redirect());
            // return redirect()->route('backstage.index'); //很抱歉，您的權限不足，發送火箭享尊榮服務
            dump(223);
        }
        dump(333);
    }
    
    public function index()
    {
        self::ifTraveler();
        dump(444);

        $attractions = Attraction::get();
        return view('backstage.attractions.index', compact('attractions'));
    }

    public function create()
    {
        if (Gate::allows('Traveler')) {
            return view('backstage.index'); //很抱歉，您的權限不足，發送火箭享尊榮服務
        }
        $tags = Tag::get();
        return view('backstage.attractions.factory', compact('tags'));
    }

    public function edit($id)
    {
        if (Gate::allows('Traveler')) {
            return view('backstage.index'); //很抱歉，您的權限不足，發送火箭享尊榮服務
        }
        $attraction = Attraction::with('tags', 'images', 'position')->find($id);
        $tags = Tag::get();
        return view('backstage.attractions.factory', compact('attraction', 'tags'));
    }
}

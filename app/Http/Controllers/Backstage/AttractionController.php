<?php

namespace App\Http\Controllers\Backstage;

use App\Tag;
use App\User;
use App\Attraction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class AttractionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (Gate::allows('viewAny',Attraction::class)) {
            if($user->role == "Admin"){
                $attractions = Attraction::paginate(10);
                return view('backstage.attractions.index',compact('attractions'));
            }else{
                $attractions = Attraction::where('user_id',$user->id)->paginate(10);
                return view('backstage.attractions.index',compact('attractions'));
            }
        }
        return view('backstage.index'); //很抱歉，您的權限不足，發送火箭享尊榮服務
    }

   

    public function create()
    {
        if (Gate::allows('view-guider',Attraction::class)) {
            $tags = Tag::get();
            return view('backstage.attractions.factory', compact('tags'));
        }
        return view('backstage.index'); //很抱歉，您的權限不足，發送火箭享尊榮服務
    }

    public function edit(Attraction $attraction)
    {
        $user = Auth::user();
        $tags = Tag::get();
        if(Gate::allows('viewAny',$attraction)){
            if($user->role == "Admin"){
                // dd($attractions);
                return view('backstage.attractions.factory', compact('attraction', 'tags'));
            }
            if(Gate::allows('update',$attraction)){
                return view('backstage.attractions.factory', compact('attraction', 'tags'));
            }
        }
        return view('backstage.index'); //很抱歉，您的權限不足，發送火箭享尊榮服務
    }
}

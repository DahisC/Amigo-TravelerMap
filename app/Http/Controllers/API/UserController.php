<?php

namespace App\Http\Controllers\API;

use App\Attraction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index($id)
    {
        dd($id, Auth::user());
        return response(compact('attractions'));
    }
}

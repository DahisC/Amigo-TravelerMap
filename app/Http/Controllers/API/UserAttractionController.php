<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserAttractionController extends Controller
{
    public function index($id)
    {
        dd($id, Auth::user(),'UserAttractionController');
        return response(compact('attractions'));
    }

}

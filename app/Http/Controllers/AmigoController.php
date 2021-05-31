<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmigoController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function create(Request $request)
    {
        // dd($request->user());
    }

    public function store(Request $request)
    {
    }


    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    //middleware測試用
    public function traveler(Request $request)
    {
        return view('test-traveler');
    }
    public function trader(Request $request)
    {
        return view('test-trader');
    }
    public function admin(Request $request)
    {
        return view('test-admin');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmigoController extends Controller
{

    public function index()
    {
        return view('test');
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmigoController extends Controller
{
   
    public function index(){
        return view('test');
    }

    public function create(){
        return view('test2');
    }

    public function store(Request $request){
    }


    public function edit($id){
    }

    public function update(Request $request, $id){
    }

    public function destroy($id){
    }
}


<?php

namespace App\Http\Controllers\Backstage;

use App\User;
use App\Http\Requests\UserRequest;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use App\Mail\amigo_map;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function index()
    {
        $users =  User::get();
        return view('backstage.users.index', compact('users'));
    }

    public function create()
    {
        return view('backstage.users.create');
    }

    public function store(UserRequest $request)
    {
        User::create($request->all());
        return redirect()->route('backstage.users.index');
    }

    public function edit(User $user)
    {
        return view('backstage.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('backstage.users.index');
    }

    public function destroy(User $user)
    {
        $user->attractions()->detach();
        $user->delete();
        return redirect()->route('backstage.users.index');
    }
    public function watch()
    {
        $pdf = PDF::loadView('welcome')->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream();
        // return $pdf->download('amigo.pdf');
    }
    public function pdfOutput()
    {
        $user = auth()->user();
        Mail::send(new amigo_map($user));
    }
}

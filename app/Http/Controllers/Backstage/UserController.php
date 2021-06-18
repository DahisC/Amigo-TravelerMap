<?php

namespace App\Http\Controllers\Backstage;

use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;


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
}

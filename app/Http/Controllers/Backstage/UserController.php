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
        if (Gate::allows('Admin')) {
            return view('backstage.users.create');
        }
        return view('backstage.index');    //很抱歉，您的權限不足，發送火箭享尊榮服務
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

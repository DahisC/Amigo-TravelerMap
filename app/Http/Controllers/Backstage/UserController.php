<?php

namespace App\Http\Controllers\Backstage;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    public function index()
    {
        if (Gate::allows('view-admin')) {
            $users =  User::get();
            return view('backstage.users.index', compact('users'));
        }
        return view('backstage.index');    //很抱歉，您的權限不足，發送火箭享尊榮服務
    }

    public function create()
    {
        if (Gate::allows('view-admin')) {
            return view('backstage.users.create');
        }
        return view('backstage.index');    //很抱歉，您的權限不足，發送火箭享尊榮服務
    }

    public function store(UserRequest $request)
    {
        if (Gate::allows('view-admin')) {
            User::create($request->all());
            return redirect()->route('backstage.users.index');
        }
        return view('backstage.index');    //很抱歉，您的權限不足，發送火箭享尊榮服務
    }

    public function edit(Request $request,User $user)
    {
        if (Gate::allows('view-admin',$user)) {
            return view('backstage.users.edit', compact('user'));
        }
        return view('backstage.index');    //很抱歉，您的權限不足，發送火箭享尊榮服務
    }

    public function update(UserRequest $request, User $user)
    {
        if (Gate::allows('view-admin',$user)) {
            $user->update($request->all());
            return redirect()->route('backstage.users.index');
        }
        return view('backstage.index');    //很抱歉，您的權限不足，發送火箭享尊榮服務
    }

    public function destroy(User $user)
    {
        if (Gate::allows('view-admin',$user)) {
            $user->attractions()->detach();
            $user->delete();
            return redirect()->route('backstage.users.index');
        }
        return view('backstage.index');    //很抱歉，您的權限不足，發送火箭享尊榮服務
    }
}

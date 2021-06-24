<?php

namespace App\Http\Controllers\Backstage;

use App\User;
use App\Attraction;
use App\Mail\amigo;
use App\Http\Requests\UserRequest;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Gate::allows('view-admin')) {
            $users =  User::paginate(10);
            return view('backstage.users.index', compact('users'));
        }
        return view('backstage.index');    //很抱歉，您的權限不足，發送火箭享尊榮服務
    }

    public function create()
    {
        if (Gate::allows('view-admin')) {
            return view('backstage.users.factory');
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

    public function edit(User $user)
    {
        if (Gate::allows('view-admin', $user)) {
            return view('backstage.users.factory', compact('user'));
        }
        return view('backstage.index');    //很抱歉，您的權限不足，發送火箭享尊榮服務
    }

    public function update(UserRequest $request, User $user)
    {
        if (Gate::allows('view-admin', $user)) {
            $user->update($request->all());
            return redirect()->route('backstage.users.index');
        }
        return view('backstage.index');    //很抱歉，您的權限不足，發送火箭享尊榮服務
    }

    public function destroy(User $user)
    {
        if (Gate::allows('view-admin', $user)) {
            $user->attractions()->detach();
            $user->delete();
            return redirect()->route('backstage.users.index');
        }
        return view('backstage.index');    //很抱歉，您的權限不足，發送火箭享尊榮服務
    }
    public function watch()
    {
        // ->setOptions(['defaultFont' => 'sans-serif'])
        $pdf = PDF::loadView('emails.PDF');
        return $pdf->stream();
        // return $pdf->download('amigo.pdf');
    }
    public function pdfOutput()
    {
            $attractions = Attraction::with('position', 'time')->whereBetween('id', [1, 5])->get();
            Mail::send(new amigo($attractions));
            // Mail::send(new amigo_map($userFavorites));
    }
}

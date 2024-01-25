<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        if (! Auth::attempt($request->only('name', 'password'))) {
            return back()
                ->withInput()
                ->withErrors([
                    'name' => 'Такого ніка не існує y мене в бд'
                ]);
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}

<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Service\DTO\UserDTO;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    protected $dto;

    public function __construct()
    {
        $this->dto = resolve(UserDTO::class);
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create($this
            ->dto
            ->prepareUsersData($request));
        event(new Registered($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

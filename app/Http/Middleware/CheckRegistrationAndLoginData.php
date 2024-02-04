<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class CheckRegistrationAndLoginData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('register')) {
            $request->merge(['email' => strtolower($request->email)]);

            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'age' => ['required', 'integer', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:mysql.users.email'],
                'password' => ['required', 'confirmed', 'string', 'min:8', 'max:255'],
            ]);
        }
        if ($request->is('login')) {
            $request->merge(['email' => strtolower($request->email)]);

            $validator = Validator::make($request->all(), [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:mysql.users.email'],
                'password' => ['required', 'confirmed', 'string', 'min:8', 'max:255'],
            ]);
        }

        if ($validator->fails()) {
            return \response()->json(['error' => $validator->errors()->first()], 400);
        }

        return $next($request);
    }
}

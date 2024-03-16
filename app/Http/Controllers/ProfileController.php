<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{

    /**
     * @param Request $request
     * @return View
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        return view('user.profile',
            compact('user'));
    }

    /**
     * @param ProfileUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        User::find(auth()->id())
            ->updateOrFail($request->validated());

        return redirect()->back()
            ->with('success', 'Оновлення профілю пройшло успішно!');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request) :RedirectResponse
    {
        $request->user()->delete();

        Auth::logout();

        return Redirect::to('/');
    }
}

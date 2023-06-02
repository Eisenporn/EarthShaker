<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeEmailRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\GenericInfoRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function updatedGeneric (GenericInfoRequest $request)
    {
        $validated = $request->validated();
        User::query()->where('id', '=', Auth::user()->getAuthIdentifier())->update($validated);
        return redirect()->route('profile');
    }

    public function updatedEmail (ChangeEmailRequest $request)
    {
        $validated = $request->validated();
        User::query()->where('id', '=', Auth::user()->getAuthIdentifier())->update($validated);
        return redirect()->route('profile');
    }

    public function updatedPassword(ChangePasswordRequest $request)
    {
        $validated = $request->validated();
        User::query()->where('id', '=', Auth::user()->getAuthIdentifier())->update($validated);
        return redirect()->route('profile');
    }
}

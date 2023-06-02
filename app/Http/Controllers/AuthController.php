<?php

namespace App\Http\Controllers;

use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup (SignupRequest $request)
    {
        $validated = $request->validated();
        $validated['password']=Hash::make($validated['password']);
        $user = User::create($validated);
        Auth::login($user);
        return redirect()->route('home');
    }

    public function signin(SigninRequest $request)
    {
        $validated=$request->validated();
        if (!Auth::attempt($validated))
        {
            return back()->withErrors(['Введенные данные неверны']);
        }
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}

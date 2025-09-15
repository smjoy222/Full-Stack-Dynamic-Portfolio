<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthenticationController extends Controller
{
    function login(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]
        );

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $user = Auth::user();
            if ((int)($user->role_id ?? 0) === 1) {
                return redirect()->route('admin.dashboard');
            }
            return redirect('/')->with('success', 'Logged in successfully. You do not have admin access.');
        }
        else{
            return back()->withErrors(['email' => 'Login failed. Invalid email or password.'])->onlyInput('email');
        }
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
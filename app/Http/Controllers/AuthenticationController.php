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

    function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Get the 'user' role (or create if it doesn't exist)
        $userRole = \TCG\Voyager\Models\Role::where('name', 'user')->first();
        if (!$userRole) {
            $userRole = \TCG\Voyager\Models\Role::create(['name' => 'user', 'display_name' => 'User']);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $userRole->id, // Assign default user role
        ]);

        // Auto login after registration
        Auth::login($user);

        return redirect()->route('admin.dashboard')->with('success', 'Registration successful!');
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
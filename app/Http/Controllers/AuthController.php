<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function registerLogic(Request $request) {
        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $validated['role'] = 'pemilik_kendaraan';
        $validated['password'] = Hash::make($request->password);

        User::create($validated);

        return redirect()->route('login');
    }

    public function login() {
        return view('auth.login');
    }

    public function loginLogic(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        } else {
            return redirect()->back();
        }

    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

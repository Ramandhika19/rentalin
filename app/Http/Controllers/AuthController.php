<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister() { return view('auth.register'); }
    public function showLogin() { return view('auth.login'); }
    public function register(Request $request)
    {
        $data = $request->validate(['name'=>'required|string|max:255','email'=>'required|email|unique:users','phone'=>'nullable|string|max:30','password'=>'required|string|min:8|confirmed']);
        $user = User::create([...$data, 'password'=>Hash::make($data['password']), 'role'=>'user']);
        Auth::login($user);
        return redirect()->route('dashboard')->with('success','Akun berhasil dibuat.');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate(['email'=>'required|email','password'=>'required']);
        if (!Auth::attempt($credentials, $request->boolean('remember'))) return back()->withErrors(['email'=>'Email atau password salah.'])->onlyInput('email');
        $request->session()->regenerate();
        return redirect()->intended(auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard'));
    }
    public function logout(Request $request)
    {
        Auth::logout(); $request->session()->invalidate(); $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}

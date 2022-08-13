<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'is_admin' => 1])) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        } elseif (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'is_analis' => 1])) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        } elseif (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'is_komite1' => 1])) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        } elseif (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'is_komite2' => 1])) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        } elseif (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'is_marketing' => 1])) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('gagal', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

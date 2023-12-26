<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            // if ($user->level == '1') {
            //     return redirect()->intended('beranda');
            // } elseif ($user->level == '2') {
            //     return redirect()->intended('pengawas');
            // }
            return redirect()->intended('home');
        }
        return view('Login.login');
    }

    public function proses(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Kolom Email harus diisi',
                'password.required' => 'Kolom Password harus diisi',
            ]
        );

        $kredensial = $request->only('email', 'password');

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();
            // if ($user->level == '1') {
            //     return redirect()->intended('beranda');
            // } elseif ($user->level == '2') {
            //     return redirect()->intended('pengawas');
            // }

            if($user){
                return redirect()->intended('home');
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Maaf, Email atau Password salah!',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

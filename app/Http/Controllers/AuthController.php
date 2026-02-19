<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        $data = [
            'pageTitle' => 'Login'
        ];

        return view('auth.login', $data);
    }

    public function loginCheck(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'username' => 'required|string',
            'password' => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('username', $r->username)->first();

        if (!$user) {
            return back()
                ->with('error', 'User tidak ditemukan')
                ->withInput();
        }

        if (!password_verify($r->password, $user->password)) {
            return back()
                ->with('error', 'Password salah')
                ->withInput();
        }

        Auth::login($user);
        $r->session()->regenerate();

        return redirect('/dashboard');
    }


    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerate();

        return redirect('/login');
    }
}

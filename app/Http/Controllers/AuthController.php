<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authencating(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        // cek login valid

        if (Auth::attempt($credentials)) {
            // cek apa status active
            if (Auth::user()->status != 'active') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'Your contact is not active, please contact admin');
                return redirect('/login');
            }

            $request->session()->regenerate();
            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }

            if (Auth::user()->role_id == 2) {
                return redirect('profile');
            }

            // return redirect()->intended('dashboard');
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Login Invalid');
        return redirect('/login');

    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function registerUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'phone' => 'max:12',
            'address' => 'required',
        ]);

        $user = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Create akun successfully');
        return redirect('/login');
    }
}

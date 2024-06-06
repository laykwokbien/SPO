<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class ControllerUser extends Controller
{
    public function registerpg()
    {
        $page = array(
            'name' => 'auth'
        );
        return view('user.register', compact('page'));
    }

    public function register()
    {
        $validator = Validator::make(request()->all(), [
            'username' => 'required|unique:users,username',
            'password' => 'required',
        ], [
            'username.required' => 'Harap isi Username Anda',
            'password.required' => 'Harap isi Password Anda'
        ]);

        if ($validator->fails()) {
            return back()->with('alerts', $validator->messages()->get('*'));
        }

        users::create([
            'email' => request()->input('email'),
            'username' => request()->input('username'),
            'password' => bcrypt(request()->input('password'))
        ]);

        return redirect('/login')->with('success', 'Akun telah berhasil untuk dibuat');
    }

    public function loginpg()
    {
        $page = array(
            'name' => 'auth'
        );
        return view('user.login', compact('page'));
    }

    public function login()
    {
        if (Auth::attempt(['username' => request()->input('username'), 'password' => request()->input('password')])) {
            request()->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return redirect('/login')->with('fail', 'Username atau Password Salah');
    }

    public function dashboard()
    {
        $page = array(
            'name' => 'dashboard'
        );
        return view('dashboard.index', compact('page'));
    }

    public function home()
    {
        $page = array(
            'name' => 'home'
        );
        return view('index', compact('page'));
    }

    public function logout() {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
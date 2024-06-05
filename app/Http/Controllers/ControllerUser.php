<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class ControllerUser extends Controller
{
    public function registerpg(){
        return view('user.register');
    }

    public function register(){
        $validator = Validator::make(request()->all(), [
            'email' => 'required|unique:users,email',
            'username' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Harap isi Email Anda',
            'email.unique' => 'Email telah digunakan',
            'username.required' => 'Harap isi Username Anda',
            'password.required' => 'Harap isi Password Anda'
        ]);

        if($validator->fails()){
            return back()->with('alerts', $validator->messages()->get('*'));
        }

        users::create([
            'email' => request()->input('email'),
            'username' => request()->input('username'),
            'password' => request()->input('password')
        ]);

        return redirect('/login')->with('success', 'Akun telah berhasil untuk dibuat');
    }

    public function loginpg() {
        return view('user.login');
    }

    public function login(){
        if(Auth::attempt(['username' => request()->input('username'), 'password' => request()->input('password')])){
            request()->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
    }

    public function dashboard() {
        return view('/dashboard');
    }
}

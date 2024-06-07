<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Presensi;
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

        return redirect('/')->with('success', 'Akun telah berhasil untuk dibuat');
    }
    
    public function updatepg($id){
        $page = array(
            'name' => 'update',
            'data' => users::with('isData')->find($id)
        );
        return view('user.update', compact('page'));
    }

    public function update($id){
        $karyawanId = users::with('isData')->find($id);
        $validator = Validator::make(request()->all(), [
            'username' => 'required|unique:users,username,'. $id,
            'nama' => 'required',
            'jabatan' => 'required',
            'email' => 'required|unique:karyawans,email,'. $id,
            'status' => 'required'
        ], [
            'username.required' => 'Username harap diisi',
            'username.unique' => 'Username sudah digunakan',
            'nama.required' => 'Nama Karyawan harap diisi',
            'jabatan.required' => 'Jabatan Karyawan harap diisi',
            'email.required' => 'Email Karyawan harap diisi',
            'email.unique' => 'Email telah digunakan',
            'status.required' => 'Status karyawan harap diisi'
        ]);

        if($validator->fails()){
            return back()->with('alerts', $validator->messages()->get('*'));
        }

        Karyawan::where('id', $karyawanId->IsData->id)->update([
            'nama' => request()->input('nama'),
            'jabatan' => request()->input('jabatan'),
            'status' => request()->input('status'),
            'email' => request()->input('email'),
        ]);

        users::where('id', $id)->update([
            'username' => request()->input('username'),
        ]);

        return redirect('/manage')->with('success', 'Data berhasil untuk diperbarui');
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

        return redirect('/')->with('fail', 'Username atau Password Salah');
    }

    public function dashboard()
    {
        $page = array(
            'name' => 'dashboard'
        );
        return view('dashboard.index', compact('page'));
    }

    public function manage()
    {
        $page = array(
            'name' => 'user',
            'data' => users::with('isData')->get(),
        );
        
        return view('user.index', compact('page'));
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function personal(){
        $page = array(
            'name' => 'personal',
            'karyawan' => Karyawan::get(),
            'update' => false,
            'user' => users::get()
        );

        return view('user.personal', compact('page'));
    }
    
    public function personalupdatepg($id){
        $page = array(
            'name' => 'personal',
            'data' => users::find($id),
            'update' => true
        );
        return view('user.personal', compact('page'));
    }   

    public function jadwal(){
        $page = array(
            'name' => 'jadwal',
            'jadwal' => Presensi::with('isKaryawan')->get(),
            'karyawan' => Karyawan::get()
        );
        return view('dashboard.jadwal', compact('page'));
    }
}

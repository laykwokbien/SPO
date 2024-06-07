<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ControllerKaryawan extends Controller
{
    public function page()
    {
        $page = array(
            'name' => 'karyawan',
            'data' => Karyawan::get(),
        );
        return view('karyawan.index', compact('page'));
    }

    public function createpg()
    {
        $page = array(
            'name' => 'karyawan'
        );
        return view('karyawan.create', compact('page'));
    }

    public function create()
    {
        $validator = Validator::make(request()->all(), [
            'nama' => 'required',
            'jabatan' => 'required',
            'email' => 'required|unique:karyawans,email',
            'password' => 'required'
        ], [
            'nama.required' => 'Dimohon isi Nama Karyawan',
            'jabatan.required' => 'Dimohon isi Jabatan Karyawan',
            'email.required' => 'Dimohon isi Email Karyawan',
            'email.unique' => 'Email ini sudah digunakan oleh Karyawan Lain',
            'password.required' => 'Dimohon isi password'
        ]);

        if ($validator->fails()) {
            return back()->with('alerts', $validator->messages()->get('*'));
        }
        
        $users = users::get();

        foreach($users as $user){
            if(password_verify(request()->input('password'), $user->password)){
                $foreign = $user->id;
                Karyawan::create([
                    'nama' => request()->input('nama'),
                    'jabatan' => request()->input('jabatan'),
                    'email' => request()->input('email'),
                    'password' => $foreign,
                ]);
                return redirect('/karyawan')->with('success', 'Data Karyawan berhasil untuk ditambahkan');
            }
        }
        return back()->with('false', "Silakan Coba Ulang Lagi");
    }

    public function updatepg($id)
    {
        $page = array(
            'name' => 'karyawan',
            'data' => Karyawan::find($id)
        );
        return view('karyawan.update', compact('page'));
    }

    public function update($id)
    {
        $karyawan = Karyawan::find($id);

        if (Auth::user()->role == 'karyawan'){
            $validator = Validator::make(request()->all(), [
                'nama' => 'required',
                'jabatan' => 'required',
                'email' => 'required|unique:karyawans,email,' . $id,
                'password' => 'required'
            ], [
                'nama.required' => 'Dimohon isi Nama Karyawan',
                'jabatan.required' => 'Dimohon isi Jabatan Karyawan',
                'email.required' => 'Dimohon isi Email Karyawan',
                'email.unique' => 'Email ini sudah digunakan oleh Karyawan Lain',
                'password.required' => 'Dimohon isi password'
            ]);
    
            if ($validator->fails()) {
                return back()->with('alerts', $validator->messages()->get('*'));
            }
        
            if(password_verify(request()->input('password'), $karyawan->password)){
                return redirect()->with('false', 'Password salah silakan ulang lagi');
            }
            
            Karyawan::where('id', $id)->update([
                'nama' => request()->input('nama'),
                'jabatan' => request()->input('jabatan'),
                'email' => request()->input('email'),
                'password' => bcrypt(request()->input('password'))
            ]);
        }
        if(Auth::user()->role == 'administrator'){
            $validator = Validator::make(request()->all(), [
                'nama' => 'required',
                'jabatan' => 'required',
                'status' => 'required',
                'email' => 'required|unique:karyawans,email,' . $id,
            ], [
                'nama.required' => 'Dimohon isi Nama Karyawan',
                'jabatan.required' => 'Dimohon isi Jabatan Karyawan',
                'status.required' => 'Status Karyawan harap diisi',
                'email.required' => 'Dimohon isi Email Karyawan',
                'email.unique' => 'Email ini sudah digunakan oleh Karyawan Lain',
            ]);
    
            if ($validator->fails()) {
                return back()->with('alerts', $validator->messages()->get('*'));
            }
            
            Karyawan::where('id', $id)->update([
                'nama' => request()->input('nama'),
                'jabatan' => request()->input('jabatan'),
                'email' => request()->input('email'),
                'status' => request()->input('status')
            ]);
        }

        return redirect('/karyawan')->with('success', 'Data Karyawan berhasil untuk diperbarui');
    }
}

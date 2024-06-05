<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ControllerKaryawan extends Controller
{
    public function page()
    {
        $page = array(
            'name' => 'karyawan',
            'data' => Karyawan::get(),
            'delete' => false
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
            'email' => 'required|unique:karyawan,email',
            'password' => 'required'
        ], [
            'nama.required' => 'Dimohon isi Nama Karyawan',
            'jabatan.required' => 'Dimohon isi Jabatan Karyawan',
            'email.required' => 'Dimohon isi Email Karyawan',
            'email.unique' => 'Email ini sudah digunakan oleh Karyawan Lain',
            'password.unique' => 'Dimohon isi password'
        ]);

        if ($validator->fails()) {
            return back()->with('alerts', $validator->messages()->get('*'));
        }

        Karyawan::create([
            'nama' => request()->input('nama'),
            'jabatan' => request()->input('jabatan'),
            'email' => request()->input('email'),
            'password' => bcrypt(request()->input('password'))
        ]);

        return redirect('/karyawan')->with('success', 'Data Karyawan berhasil untuk ditambahkan');
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
        $validator = Validator::make(request()->all(), [
            'nama' => 'required',
            'jabatan' => 'required',
            'email' => 'required|unique:karyawan,email,' . $id,
            'password' => 'required'
        ], [
            'nama.required' => 'Dimohon isi Nama Karyawan',
            'jabatan.required' => 'Dimohon isi Jabatan Karyawan',
            'email.required' => 'Dimohon isi Email Karyawan',
            'email.unique' => 'Email ini sudah digunakan oleh Karyawan Lain',
            'password.unique' => 'Dimohon isi password'
        ]);

        if ($validator->fails()) {
            return back()->with('alerts', $validator->messages()->get('*'));
        }

        Karyawan::where('id', $id)->update([
            'nama' => request()->input('nama'),
            'jabatan' => request()->input('jabatan'),
            'email' => request()->input('email'),
            'password' => bcrypt(request()->input('password'))
        ]);

        return redirect('/karyawan')->with('success', 'Data Karyawan berhasil untuk diperbarui');
    }

    public function confirm($id)
    {
        $page = array(
            'name' => 'karyawan',
            'data' => Karyawan::get(),
            'delete' => true
        );
        return view('karyawan.index', compact('page'));
    }

    public function delete($id)
    {
        Karyawan::where('id', $id)->delete();

        return redirect('/karyawan')->with('success', 'Data Karyawan berhasil untuk dihapus');
    }
}

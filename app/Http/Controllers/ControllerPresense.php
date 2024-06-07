<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use PDO;

class ControllerPresense extends Controller
{
    public function page()
    {
        $page = array(
            'name' => 'presence',
            'data' => Presensi::with('isKaryawan')->get(),
            'delete' => false
        );
        return view('presence.index', compact('page'));
    }

    public function createpg()
    {
        $page = array(
            'name' => 'presence',
            'data' => Karyawan::get(),
            'currentdate' => Carbon::createFromFormat('Y/m/d')->now(),
        );
        return view('presence.create', compact('page'));
    }

    public function create()
    {
        $validator = Validator::make(request()->all(), [
            'idKaryawan' => 'required',
            'date' => 'required',
            'waktumasuk' => 'required',
            'waktukeluar' => 'required'
        ], [
            'idKaryawan.required' => 'Harap Pilih Karyawan yang ingin dipresensi',
            'date.required' => 'Harap isi tanggal berapa untuk dipresensi',
            'waktumasuk.required' => 'Harap isi waktu masuk karyawan',
            'waktukeluar.required' => 'Harap isi waktu keluar karyawan'
        ]);

        if ($validator->fails()) {
            return back()->with('alerts', $validator->messages()->get('*'));
        }

        Presensi::create([
            'karyawan_id' => request()->input('idKaryawan'),
            'tanggal' => request()->input('date'),
            'waktu_masuk' => request()->input('waktumasuk'),
            'waktu_keluar' => request()->input('waktukeluar')
        ]);

        return redirect('/presence')->with('success', 'Jadwal Presensi berhasil untuk dibuat');
    }

    public function updatepg($id)
    {
        $page = array(
            'name' => 'presence',
            'data' => Presensi::find($id),
            'karyawan' => Karyawan::get()
        );
        return view('presence.update', compact('page'));
    }
    public function update($id)
    {
        $validator = Validator::make(request()->all(), [
            'idKaryawan' => 'required',
            'date' => 'required',
            'waktumasuk' => 'required',
            'waktukeluar' => 'required'
        ], [
            'idKaryawan.required' => 'Harap Pilih Karyawan yang ingin dipresensi',
            'date.required' => 'Harap isi tanggal berapa untuk dipresensi',
            'waktumasuk.required' => 'Harap isi waktu masuk karyawan',
            'waktukeluar.required' => 'Harap isi waktu keluar karyawan'
        ]);

        if ($validator->fails()) {
            return back()->with('alerts', $validator->messages()->get('*'));
        }

        Presensi::where('id', $id)->update([
            'karyawan_id' => request()->input('idKaryawan'),
            'tanggal' => request()->input('date'),
            'waktu_masuk' => request()->input('waktumasuk'),
            'waktu_keluar' => request()->input('waktukeluar')
        ]);

        return redirect('/presence')->with('success', 'Jadwal Presensi berhasil untuk diperbarui');
    }

    public function confirm($id)
    {
        $page = array(
            'name' => 'presence',
            'data' => Presensi::get(),
            'delete' => true
        );
        return view('presence.index', compact('page'));
    }

    public function delete($id)
    {
        Presensi::where('id', $id)->delete();

        return redirect('/presence')->with('success', 'Jadwal Prensensi berhasil untuk dihapus');
    }
}
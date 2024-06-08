<?php

namespace App\Http\Controllers;

use App\Exports\ExportPresensi;
use App\Mail\Attendances;
use App\Models\attendance;
use App\Models\Karyawan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\VarDumper\VarDumper;

class ControllerAttendance extends Controller
{
    public function hadirmasuk($id)
    {
        $Carbon = new Carbon();
        $currenttime = $Carbon::now()->format('H:i:m');
        attendance::where('id', $id)->update([
            'time_in' => $currenttime,
        ]);

        return redirect('/jadwal')->with('success', 'Berhasil untuk Absen');
    }
    public function keluar($id)
    {
        $Carbon = new Carbon();
        $currenttime = $Carbon::now()->format('H:i:m');

        attendance::where('id', $id)->update([
            'time_out' => $currenttime,
        ]);

        return redirect('/jadwal')->with('success', 'Berhasil untuk Absen');
    }

    public function exportAttendances()
    {
        $attendance = attendance::with('isUser')->get();
        $Carbon = new Carbon();
        $currentdate = $Carbon::now()->toDateString();
        return Excel::download(new ExportPresensi, 'presensi-' . $currentdate . '.xlsx');
    }

    public function sendMail()
    {
        $attendances = attendance::with('isUser')->get();
        $karyawans = Karyawan::with('isAccount')->get();
        $Carbon = new Carbon();
        $yesterday = $Carbon::yesterday()->toDateString();
        if ($attendances != null) {
            foreach ($attendances as $attendance) {
                if ($attendance->isUser->id == Auth::user()->id && $attendance->date == $yesterday) {
                    if ($attendance->time_in == null || $attendance->time_out == null) {
                        foreach ($karyawans as $karyawan) {
                            if ($karyawan->isAccount->id == Auth::user()->id) {
                                $nama = $karyawan->nama;
                                $tanggal = $karyawan->date;

                                Mail::to($karyawan->email)->send(new Attendances($nama));

                                return redirect('/dashboard')->with('messages', 'Mail telah terkirim pada gmail anda');
                            } else {
                                return redirect('/dashboard');
                            }
                        }
                    } else {
                        return redirect('/dashboard');
                    }
                } else {
                    return redirect('/dashboard');
                }
            }
        } else {
            return redirect('/dashboard');
        }
    }
}

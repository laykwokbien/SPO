<?php

namespace App\Http\Controllers;

use App\Exports\ExportPresensi;
use App\Models\attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
}

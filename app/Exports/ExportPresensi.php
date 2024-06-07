<?php

namespace App\Exports;

use App\Models\attendance as ModelsAttendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPresensi implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect(ModelsAttendance::AttendancesData());
        // return ModelsAttendance::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'user_id',
            'date',
            'time_in',
            'time_out'
        ];
    }
}

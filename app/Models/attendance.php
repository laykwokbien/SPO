<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class attendance extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function isUser()
    {
        return $this->belongsTo(users::class, 'id');
    }

    public static function AttendancesData()
    {
        $result = DB::table('attendances')->select('id', 'user_id', 'date', 'time_in', 'time_out')
            ->get()->toArray();
        return $result;
    }
}

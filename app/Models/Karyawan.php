<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function presensis(){
        return $this->hasMany(Presensi::class, 'karyawan_id');
    }

    public function isAccount(){
        return $this->hasOne(Users::class, 'id');
    }
}

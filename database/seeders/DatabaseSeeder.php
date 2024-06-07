<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Users::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 'administrator'
        ]);

        Karyawan::create([
            'nama' => 'admin',
            'jabatan' => 'administrator',
            'email' => 'admin@example.org',
            'password' => 1
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
<?php

namespace Database\Seeders;

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
            'password' => 'admin',
            'role' => 'administrator'
        ]);
        // \App\Models\User::factory(10)->create();
    }
}

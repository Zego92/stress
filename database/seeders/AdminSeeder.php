<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'fio' => 'Admin Admin Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'phone' => '+380999999999',
            'gravatar' => 'test',
            'password' => Hash::make('12345678'),
        ]);

    }
}

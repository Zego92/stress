<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fio' => 'Test User',
            'username' => 'user',
            'email' => 'user@test.com',
            'phone' => '+380999999999',
            'gravatar' => 'test',
            'password' => Hash::make('12345678'),
        ]);
    }
}

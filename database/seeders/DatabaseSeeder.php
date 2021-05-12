<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(LanguageSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(FeedbackPageSeeder::class);
        $this->call(FooterSeeder::class);
        $this->call(MainHeaderSeeder::class);
        $this->call(UserSeeder::class);
    }
}

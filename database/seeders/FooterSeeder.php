<?php

namespace Database\Seeders;

use App\Models\Footer;
use App\Models\Language;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    public function run()
    {
        Footer::create([
            'language_id' => Language::where('code', '=', 'en')->first()->id,
            'contactTitle' => 'Our Contacts',
            'email' => 'test@test.com',
            'phone' => '+380999999999',
        ]);
        Footer::create([
            'language_id' => Language::where('code', '=', 'ru')->first()->id,
            'contactTitle' => 'Контакты',
            'email' => 'test@test.com',
            'phone' => '+380999999999',
        ]);
        Footer::create([
            'language_id' => Language::where('code', '=', 'ua')->first()->id,
            'contactTitle' => 'Контакти',
            'email' => 'test@test.com',
            'phone' => '+380999999999',
        ]);
    }
}

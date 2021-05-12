<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\MainHeader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainHeaderSeeder extends Seeder
{

    public function run()
    {
        MainHeader::create([
            'language_id' => Language::where('code', '=', 'ru')->first()->id,
            'homeTitle' => 'Главная',
            'ourProjectsTitle' => 'Наши Работы',
            'contactTitle' => 'Контакты',
            'feedbackTitle' => 'Рассчитать стоимость',
            'brandLogoImage' => 'brand.png',
        ]);
        MainHeader::create([
            'language_id' => Language::where('code', '=', 'ua')->first()->id,
            'homeTitle' => 'Головна',
            'ourProjectsTitle' => 'Наші роботи',
            'contactTitle' => 'Контакти',
            'feedbackTitle' => 'Розрахувати вартість',
            'brandLogoImage' => 'brand.png',
        ]);
        MainHeader::create([
            'language_id' => Language::where('code', '=', 'en')->first()->id,
            'homeTitle' => 'Home',
            'ourProjectsTitle' => 'Our Projects',
            'contactTitle' => 'Contacts',
            'feedbackTitle' => 'Calculate the cost',
            'brandLogoImage' => 'brand.png',
        ]);

    }
}

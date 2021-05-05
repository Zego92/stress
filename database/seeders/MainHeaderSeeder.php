<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\MainHeader;
use Illuminate\Database\Seeder;

class MainHeaderSeeder extends Seeder
{

    public function run()
    {
        foreach (Language::all() as $language) {
            MainHeader::create([
                'language_id' => $language->id,
                'brandLogoImage' => '/img/brand.png',
                'homeTitle' => 'Главная',
                'ourProjectsTitle' => 'Наши Работы',
                'contactTitle' => 'Контакты',
                'feedbackTitle' => 'Калькулятор расчета',
            ]);
        }

    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public const LANG_RU = [
        'Ремонт под ключ',
        'Утепление фасадов',
        'Фундаментные работы',
        'Кровельные работы',
        'Траншейные работы',
        'Топпинг промышленных полов'
    ];
    public const LANG_UA = [
        'Ремонт під ключ',
        'Утеплення фасадів',
        'Фундаментні роботи',
        'Покрівельні роботи',
        'Траншейні роботи',
        'Топпінг промислових підлог'
    ];
    public const LANG_EN = [
        'Turnkey repair',
        'Thermal insulation of facades',
        'Foundation works',
        'Roofing',
        'Trenching works',
        'Industrial floor topping'
    ];

    public function run()
    {
        foreach (self::LANG_RU as $name){
            Category::create([
                'language_id' => Language::where('code', '=', 'ru')->first()->id,
                'name' => $name,
                'image' => 'test.png',
            ]);
        }
        foreach (self::LANG_EN as $name){
            Category::create([
                'language_id' => Language::where('code', '=', 'en')->first()->id,
                'name' => $name,
                'image' => 'test.png',
            ]);
        }
        foreach (self::LANG_UA as $name){
            Category::create([
                'language_id' => Language::where('code', '=', 'ua')->first()->id,
                'name' => $name,
                'image' => 'test.png',
            ]);
        }

    }
}

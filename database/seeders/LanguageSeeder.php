<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public const LANGUAGES = [
        'code' => ['ua', 'en', 'ru'],
        'name' => ['Украинский', 'Английский', 'Русский']
    ];


    public function run()
    {
        foreach (self::LANGUAGES as $language){
            Language::create([
                'code' => $language['code'],
                'name' => $language['name'],
            ]);
        }
    }
}

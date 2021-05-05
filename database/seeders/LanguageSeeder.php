<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public const LANGUAGES = ['ru', 'en', 'ua'];


    public function run()
    {
        foreach (self::LANGUAGES as $language){
            Language::create([
                'code' => $language
            ]);
        }
    }
}

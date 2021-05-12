<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{

    public const LANG = ['ru', 'en', 'ua'];

    public function run()
    {
        foreach (self::LANG as $lang){
            DB::table('banners')->insert([
                'language_id' => Language::where('code', '=', $lang)->first()->id,
                'image' => 'test.png',
                'title' => 'Тепло и уют вашего дома',
            ]);
        }
//        $banner = Banner::create([
//            'language_id' => Language::where('code', '=', 'ru')->first()->id,
//            'image' => 'test.png',
//            'title' => 'Тепло и уют вашего дома',
//        ]);
//        Banner::create([
//            'language_id' => Language::where('code', '=', 'ua')->first()->id,
//            'image' => 'test.png',
//            'title' => 'Тепло і затишок вашого будинку',
//        ]);
//        Banner::create([
//            'language_id' => Language::where('code', '=', 'en')->first()->id,
//            'image' => 'test.png',
//            'title' => 'Warmth and comfort of your home',
//        ]);
    }
}

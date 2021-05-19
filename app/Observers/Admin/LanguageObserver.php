<?php

namespace App\Observers\Admin;

use App\Models\Category;
use App\Models\Contact;
use App\Models\FeedbackPage;
use App\Models\Footer;
use App\Models\Language;
use App\Models\MainHeader;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LanguageObserver
{
    public const LANG_RU = [
        'Ремонт под ключ',
        'Утепление фасадов',
        'Фундаментные работы',
        'Кровельные работы',
        'Траншейные работы',
        'Топпинг промышленных полов'
    ];

    public function created(Language $language)
    {
        $banner = DB::table('banners')->insertGetId([
            'language_id' => $language->id,
            'title' => 'Тепло и уют вашего дома',
        ]);
        DB::table('banners')->where('id', '=', $banner)
            ->update(['image' => 'test.png',]);
        foreach (self::LANG_RU as $name){
            $cat = DB::table('categories')->insertGetId([
                'language_id' => $language->id,
                'name' => $name,
                'slug' => Str::slug($name),

            ]);
            DB::table('categories')
                ->where('id', '=', $cat)
                ->update(['image' => 'test.png',]);
        }
        DB::table('contacts')
            ->insert([
                'language_id' => $language->id,
                'firstPhone' => '+380999999999',
                'secondPhone' => '+380988888888',
                'thirdPhone' => '+380987777777',
                'address' => 'test',
                'startTimeWork' => now()->startOfDay()->addHours(9),
                'endTimeWork' => now()->startOfDay()->addHours(18),
                'email' => 'test@test.com',
                'gMapLink' => "<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2562.740723837449!2d36.17702861610036!3d50.03495397942017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4127a3e2e7228d17%3A0xe340d2caca2950b8!2sVelyka%20Panasivska%20St%2C%20250%2C%20Kharkiv%2C%20Kharkivs&#39;ka%20oblast%2C%2061000!5e0!3m2!1sen!2sua!4v1620293051995!5m2!1sen!2sua' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'></iframe>",
            ]);

        DB::table('feedback_pages')
            ->insert([
            'language_id' => $language->id,
            'headerTitle' => 'Наши квалифицированные сотрудники помогут Вам подобрать наилучшие решения на рынке для вашего уюта и комфорта',
            'fioTitle' => 'Укажите ваше ФИО',
            'fioPlaceholderTitle' => 'Иванов Иван Иванович',
            'emailTitle' => 'Ваш Email',
            'emailPlaceholderTitle' => 'email@email.com',
            'phoneTitle' => 'Контактный телефон',
            'phonePlaceholderTitle' => '+380111111111',
            'messageTitle' => 'Укажите тему',
            'messagePlaceholderTitle' => 'Например ремонт квартиры',
            'messageDescriptionTitle' => 'Краткое описание',
            'messageDescriptionPlaceholderTitle' => 'Краткое описание',
        ]);
        DB::table('footers')->insert([
            'language_id' => $language->id,
            'contactTitle' => 'Контакты',
            'email' => 'test@test.com',
            'phone' => '+380999999999',
        ]);
        $header = DB::table('main_headers')->insertGetId([
            'language_id' => $language->id,
            'homeTitle' => 'Главная',
            'ourProjectsTitle' => 'Наши Работы',
            'contactTitle' => 'Контакты',
            'feedbackTitle' => 'Рассчитать стоимость',

        ]);
        DB::table('main_headers')
            ->where('id', '=', $header)
            ->update(['brandLogoImage' => 'brand.png',]);
    }

    public function updated(Language $language)
    {
        //
    }

    public function deleted(Language $language)
    {
        //
    }

    public function restored(Language $language)
    {
        //
    }

    public function forceDeleted(Language $language)
    {
        //
    }
}

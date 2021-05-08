<?php

namespace Database\Seeders;

use App\Models\FeedbackPage;
use App\Models\Language;
use Illuminate\Database\Seeder;

class FeedbackPageSeeder extends Seeder
{
    public function run()
    {
        FeedbackPage::create([
            'language_id' => Language::where('code', '=', 'ru')->first()->id,
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
        FeedbackPage::create([
            'language_id' => Language::where('code', '=', 'en')->first()->id,
            'headerTitle' => 'Our qualified staff will help you find the best solutions on the market for your comfort and convenience.',
            'fioTitle' => 'Enter your full name',
            'fioPlaceholderTitle' => 'Ivanov Ivan Ivanovich',
            'emailTitle' => 'Your Email',
            'emailPlaceholderTitle' => 'email@email.com',
            'phoneTitle' => 'Your phone number',
            'phonePlaceholderTitle' => '+380111111111',
            'messageTitle' => 'Specify a subject',
            'messagePlaceholderTitle' => 'For example apartment renovation',
            'messageDescriptionTitle' => 'Short description',
            'messageDescriptionPlaceholderTitle' => 'Short description',
        ]);
        FeedbackPage::create([
            'language_id' => Language::where('code', '=', 'ua')->first()->id,
            'headerTitle' => 'Наші кваліфіковані співробітники допоможуть Вам підібрати найкращі рішення на ринку для вашого затишку і комфорту',
            'fioTitle' => "Введіть Ваше повне ім'я",
            'fioPlaceholderTitle' => 'Іванов Іван Іванович',
            'emailTitle' => 'Ваш Email',
            'emailPlaceholderTitle' => 'email@email.com',
            'phoneTitle' => 'Ваш номер телефону',
            'phonePlaceholderTitle' => '+380111111111',
            'messageTitle' => 'Вкажіть тему',
            'messagePlaceholderTitle' => 'Наприклад, ремонт квартири',
            'messageDescriptionTitle' => 'Короткий опис',
            'messageDescriptionPlaceholderTitle' => 'Короткий опис',
        ]);
    }
}

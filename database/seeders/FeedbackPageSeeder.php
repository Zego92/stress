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
            'fioPlaceholderTitle' => 'Например Иванов Иван Иванович',
            'emailTitle' => 'Ваш Email',
            'emailPlaceholderTitle' => 'Например email@email.com',
            'phoneTitle' => 'Контактный телефон',
            'phonePlaceholderTitle' => 'Например +380111111111',
            'messageTitle' => 'Укажите тему',
            'messagePlaceholderTitle' => 'Например ремонт квартиры',
            'messageDescriptionTitle' => 'Краткое описание',
            'messageDescriptionPlaceholderTitle' => 'Краткое описание',
            'submitButtonTitle' => 'Отправить',
        ]);
        FeedbackPage::create([
            'language_id' => Language::where('code', '=', 'en')->first()->id,
            'headerTitle' => 'Our qualified staff will help you find the best solutions on the market for your comfort and convenience.',
            'fioTitle' => 'Enter your full name',
            'fioPlaceholderTitle' => 'For example Ivanov Ivan Ivanovich',
            'emailTitle' => 'Your Email',
            'emailPlaceholderTitle' => 'For example email@email.com',
            'phoneTitle' => 'Your phone number',
            'phonePlaceholderTitle' => 'For example +380111111111',
            'messageTitle' => 'Specify a subject',
            'messagePlaceholderTitle' => 'For example apartment renovation',
            'messageDescriptionTitle' => 'Short description',
            'messageDescriptionPlaceholderTitle' => 'Short description',
            'submitButtonTitle' => 'Send',
        ]);
        FeedbackPage::create([
            'language_id' => Language::where('code', '=', 'ua')->first()->id,
            'headerTitle' => 'Наші кваліфіковані співробітники допоможуть Вам підібрати найкращі рішення на ринку для вашого затишку і комфорту',
            'fioTitle' => "Введіть Ваше повне ім'я",
            'fioPlaceholderTitle' => 'Напрклад, Іванов Іван Іванович',
            'emailTitle' => 'Ваш Email',
            'emailPlaceholderTitle' => 'Напрклад, email@email.com',
            'phoneTitle' => 'Ваш номер телефону',
            'phonePlaceholderTitle' => 'Напрклад, +380111111111',
            'messageTitle' => 'Вкажіть тему',
            'messagePlaceholderTitle' => 'Наприклад, ремонт квартири',
            'messageDescriptionTitle' => 'Короткий опис',
            'messageDescriptionPlaceholderTitle' => 'Короткий опис',
            'submitButtonTitle' => 'Надіслати',
        ]);
    }
}

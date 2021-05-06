<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Language;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run()
    {
        Contact::create([
            'language_id' => Language::where('code', '=', 'ru')->first()->id,
            'firstPhone' => '+380999999999',
            'secondPhone' => '+380988888888',
            'thirdPhone' => '+380987777777',
            'address' => 'test',
            'startTimeWork' => now()->startOfDay()->addHours(9),
            'endTimeWork' => now()->startOfDay()->addHours(18),
            'email' => 'test@test.com',
            'gMapLink' => "<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2562.740723837449!2d36.17702861610036!3d50.03495397942017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4127a3e2e7228d17%3A0xe340d2caca2950b8!2sVelyka%20Panasivska%20St%2C%20250%2C%20Kharkiv%2C%20Kharkivs&#39;ka%20oblast%2C%2061000!5e0!3m2!1sen!2sua!4v1620293051995!5m2!1sen!2sua' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'></iframe>",
        ]);
    }
}

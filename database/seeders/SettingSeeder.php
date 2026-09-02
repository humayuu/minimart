<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'web_name' => 'Minimart',
            'web_description' => 'Your everyday shopping partner. Quality products, fair prices, fast delivery.',
            'fb_account' => 'https://www.facebook.com/',
            'x_account' => 'https://www.x.com/',
            'instagram_account' => 'https://www.instagram.com/',
            'whatsapp' => '0324697826'
        ]);
    }
}
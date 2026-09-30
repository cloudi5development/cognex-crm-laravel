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
        $settings  = [
            ['key' => 'website_name', 'value' => 'Website'],
            ['key' => 'smtp_mailer', 'value' => 'smtp'],
            ['key' => 'mail_host', 'value' => 'smtp.gmail.com'],
            ['key' => 'mail_encryption', 'value' => 'tls'],
            ['key' => 'mail_port', 'value' => '587'],
            ['key' => 'mail_username', 'value' => 'stagingcloudi5@gmail.com'],
            ['key' => 'mail_password', 'value' => 'flndkabrpfyguqyi'],
            ['key' => 'mail_from_address', 'value' => 'stagingcloudi5@gmail.com'],
            ['key' => 'mail_to_address', 'value' => ''],
            ['key' => 'mail_from_name', 'value' => 'Website'],
            ['key' => 'mobile', 'value' => null],
            ['key' => 'email', 'value' => null],
            ['key' => 'alter_email', 'value' => ''],
            ['key' => 'facebook', 'value' => null],
            ['key' => 'instagram', 'value' => null],
            ['key' => 'linkedin', 'value' => null],
            ['key' => 'twitter', 'value' => null],
            ['key' => 'youtube', 'value' => null],
        ];
        foreach ($settings as $list_of_setting) {
            Setting::firstOrCreate($list_of_setting);
        }
    }
}

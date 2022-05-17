<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

/**
 * Class SettingsTableSeeder
 *
 * @package Database\Seeders
 */
class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = config('settings');

        foreach ($settings as $key => $setting) {
            Setting::query()->firstOrCreate(['key' => $key], [
                'key' => $key,
                'value' => $setting['default_value'],
            ]);
        }
    }
}

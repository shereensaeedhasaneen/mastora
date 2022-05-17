<?php

namespace Database\Seeders;

use App\Models\TranslationLanguage;
use Illuminate\Database\Seeder;

class TranslationLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('localization.supported_languages') as $key => $value) {
            TranslationLanguage::create(['code' => $key, 'name' => $value]);
        }
    }
}

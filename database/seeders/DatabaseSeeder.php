<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        activity()->disableLogging();

        $this->call([
            SettingsTableSeeder::class,
            RolesAndPermissionsSeederNew::class,
            AdminUserSeeder::class,
            TranslationLanguageSeeder::class,
            LoanSeeder::class,
            CountrySeeder::class,
            BankBranchSeeder::class,
            UserSeeder::class
        ]);

        // Enable logging before run db seeders.
        activity()->enableLogging();
    }
}

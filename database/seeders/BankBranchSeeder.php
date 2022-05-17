<?php

namespace Database\Seeders;

use App\Models\BankBranch;
use Illuminate\Database\Seeder;

class BankBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $branches = [
        [
            'name' => 'القاهـــرة',
            'country_id' => 1
        ],
        [
            'name' => 'حلـوان',
            'country_id' => 1
        ],
        [
            'name' => 'عين حلوان',
            'country_id' => 1
        ],
        [
            'name' => 'الزيتـون',
            'country_id' => 1
        ],
        [
            'name' => 'مدينة نصر الثالث',
            'country_id' => 1
        ],
        [
            'name' => 'مدينة نصر السابع',
            'country_id' => 1
        ],
        [
            'name' => 'النصـــر',
            'country_id' => 1
        ],
        [
            'name' => 'المقطـم',
            'country_id' => 1
        ],
        [
            'name' => 'شبرا الخيمة',
            'country_id' => 2
        ],
        [
            'name' => 'بنهــــــا',
            'country_id' => 2
        ],
        [
            'name' => 'الجيـزة',
            'country_id' => 3
        ],
        [
            'name' => 'المهندسين',
            'country_id' => 3
        ],
        [
            'name' => '6 أكتوبر',
            'country_id' => 3
        ],
        [
            'name' => 'الفيـوم',
            'country_id' => 4
        ],
        [
            'name' => 'بنى سويف',
            'country_id' => 4
        ],
       ]; 
       BankBranch::insert($branches);

    }
}

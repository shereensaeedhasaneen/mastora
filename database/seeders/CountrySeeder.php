<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                "name" => "القاهـــرة"
            ],
            [
                "name" => "القليوبية"
            ],
            [
                "name" => "الجيـزة"
            ],
            [
                "name" => "الفيـوم"
            ],
            [
                "name" => "بنى سويف"
            ],
            [
                "name" => "المنيـا"
            ],
            [
                "name" => "أســـيوط"
            ],
            [
                "name" => "الوادى الجديــد"
            ],
            [
                "name" => "سوهــــاج"
            ],
            [
                "name" => "قنـا"
            ],
            [
                "name" => "الاقصــــر"
            ],
            [
                "name" => "اسـوان"
            ],
            [
                "name" => "الغربية"
            ],
            [
                "name" => "البحيرة"
            ],
            [
                "name" => "الأسكندريـة"
            ],
            [
                "name" => "المنوفية"
            ],
            [
                "name" => "كفر الشيخ"
            ],
            [
                "name" => "الدقهلية"
            ],
            [
                "name" => "الشرقية"
            ],
            [
                "name" => "دمياط"
            ],
            [
                "name" => "السويس"
            ],
            [
                "name" => "جنوب سيناء"
            ],
            [
                "name" => "الأسماعيلية"
            ],
            [
                "name" => "بورسعيد"
            ],
            [
                "name" => "شمال سيناء"
            ],
            [
                "name" => "البحر الأحمر"
            ],

        ]; 
        Country::insert($countries);
    }
}

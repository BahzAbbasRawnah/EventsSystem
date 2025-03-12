<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gulfCountries = [
            [
                'name_en' => 'Saudi Arabia',
                'name_ar' => 'المملكة العربية السعودية',
                'flag' => '🇸🇦',
                'code' => 'SA',
            ],


        ];

        // Insert data into the countries table
        foreach ($gulfCountries as $country) {
            DB::table('countries')->insert([
                'name_en' => $country['name_en'],
                'name_ar' => $country['name_ar'],
                'flag' => $country['flag'],
                'code' => $country['code'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gulfCities = [
            // Saudi Arabia (country_id = 1)
            [
                'name_en' => 'Riyadh',
                'name_ar' => 'الرياض',
                'country_id' => 1,
            ],
            [
                'name_en' => 'Jeddah',
                'name_ar' => 'جدة',
                'country_id' => 1,
            ],
            [
                'name_en' => 'Mecca',
                'name_ar' => 'مكة',
                'country_id' => 1,
            ],

  


        ];

        // Insert data into the cities table
        foreach ($gulfCities as $city) {
            DB::table('cities')->insert([
                'name_en' => $city['name_en'],
                'name_ar' => $city['name_ar'],
                'country_id' => $city['country_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
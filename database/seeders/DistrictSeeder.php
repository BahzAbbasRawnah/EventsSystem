<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ksaDistricts = [
            // Riyadh (city_id = 1)
            [
                'name_en' => 'Al Olaya',
                'name_ar' => 'العالية',
                'city_id' => 1,
            ],
            [
                'name_en' => 'Al Malaz',
                'name_ar' => 'الملز',
                'city_id' => 1,
            ],
            [
                'name_en' => 'Al Narjis',
                'name_ar' => 'النجرس',
                'city_id' => 1,
            ],

            // Jeddah (city_id = 2)
            [
                'name_en' => 'Al Hamra',
                'name_ar' => 'الحمرا',
                'city_id' => 2,
            ],
            [
                'name_en' => 'Al Rawdah',
                'name_ar' => 'الروضة',
                'city_id' => 2,
            ],
            [
                'name_en' => 'Al Safa',
                'name_ar' => 'الصفا',
                'city_id' => 2,
            ],

            // Mecca (city_id = 3)
            [
                'name_en' => 'Al Aziziyah',
                'name_ar' => 'العزيزية',
                'city_id' => 3,
            ],
            [
                'name_en' => 'Al Shisha',
                'name_ar' => 'الششة',
                'city_id' => 3,
            ],
            [
                'name_en' => 'Al Masfalah',
                'name_ar' => 'المسفلة',
                'city_id' => 3,
            ],
        ];

        // Insert data into the districts table
        foreach ($ksaDistricts as $district) {
            DB::table('districts')->insert([
                'name_en' => $district['name_en'],
                'name_ar' => $district['name_ar'],
                'city_id' => $district['city_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
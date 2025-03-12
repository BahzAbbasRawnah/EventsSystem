<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define your categories data
        $categories = [
            [
                'name_en' => 'Music',
                'name_ar' => 'موسيقى',
            ],
            [
                'name_en' => 'Sports',
                'name_ar' => 'رياضة',
            ],
            [
                'name_en' => 'Art',
                'name_ar' => 'فن',
            ],
            [
                'name_en' => 'Technology',
                'name_ar' => 'تكنولوجيا',
            ],
            [
                'name_en' => 'Food',
                'name_ar' => 'طعام',
            ],
        ];

        // Insert data into the categories table
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name_en' => $category['name_en'],
                'name_ar' => $category['name_ar'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
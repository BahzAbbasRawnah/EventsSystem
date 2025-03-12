<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = [
            [
                'name_en' => 'Unlimited Events',
                'name_ar' => 'أحداث غير محدودة',
            ],
            [
                'name_en' => 'Premium Support',
                'name_ar' => 'دعم مميز',
            ],
            [
                'name_en' => 'Advanced Analytics',
                'name_ar' => 'تحليلات متقدمة',
            ],
            [
                'name_en' => 'Custom Branding',
                'name_ar' => 'تخصيص العلامة التجارية',
            ],
            [
                'name_en' => 'Email Notifications',
                'name_ar' => 'إشعارات البريد الإلكتروني',
            ],
        ];

        // Insert data into the features table
        foreach ($features as $feature) {
            DB::table('features')->insert([
                'name_en' => $feature['name_en'],
                'name_ar' => $feature['name_ar'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
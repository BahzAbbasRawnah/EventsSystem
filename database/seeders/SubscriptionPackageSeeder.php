<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriptionPackages = [
            [
                'name_en' => 'Basic Plan',
                'name_ar' => 'الخطة الأساسية',
                'period' => 'monthly',
                'price' => 9.99,
                'description' => 'Access to basic features for one month.',
            ],
            [
                'name_en' => 'Pro Plan',
                'name_ar' => 'الخطة الاحترافية',
                'period' => 'monthly',
                'price' => 19.99,
                'description' => 'Access to advanced features for one month.',
            ],
            [
                'name_en' => 'Annual Plan',
                'name_ar' => 'الخطة السنوية',
                'period' => 'yearly',
                'price' => 99.99,
                'description' => 'Access to all features for one year.',
            ],
            [
                'name_en' => 'Weekly Trial',
                'name_ar' => 'تجربة أسبوعية',
                'period' => 'weekly',
                'price' => 4.99,
                'description' => 'Try out premium features for one week.',
            ],
            [
                'name_en' => 'Daily Pass',
                'name_ar' => 'اشتراك يومي',
                'period' => 'daily',
                'price' => 0.99,
                'description' => 'Access all features for one day.',
            ],
        ];

        // Insert data into the subscription_packages table
        foreach ($subscriptionPackages as $package) {
            DB::table('subscription_packages')->insert([
                'name_en' => $package['name_en'],
                'name_ar' => $package['name_ar'],
                'period' => $package['period'],
                'price' => $package['price'],
                'description' => $package['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
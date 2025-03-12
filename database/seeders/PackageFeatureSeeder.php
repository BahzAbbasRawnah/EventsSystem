<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packageFeatures = [
            [
                'subscription_package_id' => 1, // Basic Plan
                'feature_id' => 1, // Unlimited Events
            ],
            [
                'subscription_package_id' => 1, // Basic Plan
                'feature_id' => 5, // Email Notifications
            ],
            [
                'subscription_package_id' => 2, // Pro Plan
                'feature_id' => 1, // Unlimited Events
            ],
            [
                'subscription_package_id' => 2, // Pro Plan
                'feature_id' => 2, // Premium Support
            ],
            [
                'subscription_package_id' => 2, // Pro Plan
                'feature_id' => 3, // Advanced Analytics
            ],
            [
                'subscription_package_id' => 3, // Annual Plan
                'feature_id' => 1, // Unlimited Events
            ],
            [
                'subscription_package_id' => 3, // Annual Plan
                'feature_id' => 2, // Premium Support
            ],
            [
                'subscription_package_id' => 3, // Annual Plan
                'feature_id' => 3, // Advanced Analytics
            ],
            [
                'subscription_package_id' => 3, // Annual Plan
                'feature_id' => 4, // Custom Branding
            ],
            [
                'subscription_package_id' => 3, // Annual Plan
                'feature_id' => 5, // Email Notifications
            ],
        ];

        // Insert data into the package_features table
        foreach ($packageFeatures as $packageFeature) {
            DB::table('package_features')->insert([
                'subscription_package_id' => $packageFeature['subscription_package_id'],
                'feature_id' => $packageFeature['feature_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
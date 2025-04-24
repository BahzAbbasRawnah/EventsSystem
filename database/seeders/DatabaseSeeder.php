<?php

namespace Database\Seeders;

use AnourValar\EloquentSerialize\Package;
use App\Models\District;
use App\Models\Feature;
use App\Models\User;
use Faker\Provider\ar_EG\Payment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123456789'),
        ]);
        // Comment out the default seeders when using demo data
        $this->call([
            CountriesSeeder::class,
            CitiesSeeder::class,
            DistrictSeeder::class,
            // CategoriesTableSeeder::class,
            // PaymentMethodSeeder::class,
            // SubscriptionPackageSeeder::class,
            // FeatureSeeder::class,
            // PackageFeatureSeeder::class,
        ]);

        // Use the demo data seeder instead
        // $this->call([
        //     DemoDataSeeder::class,
        //     PaymentMethodSeeder::class,
        //     SubscriptionPackageSeeder::class,
        //     FeatureSeeder::class,
        //     PackageFeatureSeeder::class,
        // ]);
    }
}

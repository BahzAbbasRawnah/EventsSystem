<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sqlFile = database_path('seeders/demo_data.sql');
        
        if (File::exists($sqlFile)) {
            $sql = File::get($sqlFile);
            
            // Split SQL file into individual statements
            $statements = array_filter(array_map('trim', explode(';', $sql)), function($statement) {
                return !empty($statement) && strpos($statement, '--') !== 0;
            });
            
            // Execute each statement
            foreach ($statements as $statement) {
                if (!empty($statement)) {
                    DB::statement($statement);
                }
            }
            
            $this->command->info('Demo data has been seeded successfully!');
        } else {
            $this->command->error('SQL file not found: ' . $sqlFile);
        }
    }
}

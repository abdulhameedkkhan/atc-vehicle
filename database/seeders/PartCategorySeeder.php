<?php

namespace Database\Seeders;

use App\Models\PartCategory;
use Illuminate\Database\Seeder;

class PartCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Engine Parts',
            'Brake System',
            'Transmission',
            'Body Parts',
            'Lighting',
            'Fuel System',
            'HVAC',
            'Electrical',
            'Suspension',
            'Exhaust',
            'Other',
        ];

        foreach ($categories as $name) {
            PartCategory::firstOrCreate(['name' => $name]);
        }
    }
}

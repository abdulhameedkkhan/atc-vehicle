<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'TOYOTA',
            'NISSAN',
            'HONDA',
            'MAZDA',
            'MITSUBISHI',
            'SUZUKI',
            'SUBARU',
            'ISUZU',
            'LEXUS',
            'DAIHATSU',
            'HINO',
            'MITSUOKA',
            'Other',
        ];

        foreach ($brands as $name) {
            Brand::firstOrCreate(['name' => $name]);
        }
    }
}

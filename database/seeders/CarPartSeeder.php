<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarPart;

class CarPartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carParts = [
            [
                'name' => 'Toyota Corolla Brake Pads Set',
                'description' => 'High-quality front and rear brake pads for Toyota Corolla 2010-2018. OEM quality, excellent stopping power.',
                'brand' => 'TOYOTA',
                'category' => 'Brake System',
                'model' => 'Corolla 2010-2018',
                'price' => 85.00,
                'condition' => 'New',
                'part_number' => 'BP-COROLLA-2010',
                'stock_quantity' => 25,
                'is_available' => true,
            ],
            [
                'name' => 'Honda Civic Air Filter',
                'description' => 'OEM replacement air filter for Honda Civic 2012-2016. Ensures clean air intake for optimal engine performance.',
                'brand' => 'HONDA',
                'category' => 'Engine Parts',
                'model' => 'Civic 2012-2016',
                'price' => 28.50,
                'condition' => 'New',
                'part_number' => 'AF-CIVIC-2012',
                'stock_quantity' => 50,
                'is_available' => true,
            ],
            [
                'name' => 'Nissan Altima Spark Plugs Set',
                'description' => 'Set of 4 iridium spark plugs for Nissan Altima 2013-2018. Improved fuel efficiency and engine performance.',
                'brand' => 'NISSAN',
                'category' => 'Engine Parts',
                'model' => 'Altima 2013-2018',
                'price' => 45.00,
                'condition' => 'New',
                'part_number' => 'SP-ALTIMA-2013',
                'stock_quantity' => 30,
                'is_available' => true,
            ],
            [
                'name' => 'Mazda CX-5 Oil Filter',
                'description' => 'Premium oil filter for Mazda CX-5 2013-2020. Superior filtration for engine protection.',
                'brand' => 'MAZDA',
                'category' => 'Engine Parts',
                'model' => 'CX-5 2013-2020',
                'price' => 15.75,
                'condition' => 'New',
                'part_number' => 'OF-CX5-2013',
                'stock_quantity' => 40,
                'is_available' => true,
            ],
            [
                'name' => 'Subaru Forester Windshield Wiper Blades',
                'description' => 'Pair of premium windshield wiper blades for Subaru Forester 2014-2018. Rain-X technology for clear visibility.',
                'brand' => 'SUBARU',
                'category' => 'Body Parts',
                'model' => 'Forester 2014-2018',
                'price' => 32.00,
                'condition' => 'New',
                'part_number' => 'WB-FORESTER-2014',
                'stock_quantity' => 35,
                'is_available' => true,
            ],
            [
                'name' => 'Mitsubishi Lancer Timing Belt Kit',
                'description' => 'Complete timing belt kit with tensioner and water pump for Mitsubishi Lancer 2008-2016. Essential maintenance kit.',
                'brand' => 'MITSUBISHI',
                'category' => 'Engine Parts',
                'model' => 'Lancer 2008-2016',
                'price' => 185.00,
                'condition' => 'New',
                'part_number' => 'TB-LANCER-2008',
                'stock_quantity' => 12,
                'is_available' => true,
            ],
            [
                'name' => 'Suzuki Swift Headlight Bulb Set',
                'description' => 'Pair of H4 halogen headlight bulbs for Suzuki Swift 2010-2017. Bright white light for better visibility.',
                'brand' => 'SUZUKI',
                'category' => 'Lighting',
                'model' => 'Swift 2010-2017',
                'price' => 22.50,
                'condition' => 'New',
                'part_number' => 'HB-SWIFT-2010',
                'stock_quantity' => 45,
                'is_available' => true,
            ],
            [
                'name' => 'Toyota Camry Fuel Filter',
                'description' => 'Premium fuel filter for Toyota Camry 2012-2017. Protects fuel injection system from contaminants.',
                'brand' => 'TOYOTA',
                'category' => 'Fuel System',
                'model' => 'Camry 2012-2017',
                'price' => 38.00,
                'condition' => 'New',
                'part_number' => 'FF-CAMRY-2012',
                'stock_quantity' => 28,
                'is_available' => true,
            ],
            [
                'name' => 'Honda Accord Transmission Fluid Filter',
                'description' => 'Genuine transmission fluid filter for Honda Accord 2013-2017. Maintains smooth gear shifting.',
                'brand' => 'HONDA',
                'category' => 'Transmission',
                'model' => 'Accord 2013-2017',
                'price' => 42.50,
                'condition' => 'New',
                'part_number' => 'TF-ACCORD-2013',
                'stock_quantity' => 18,
                'is_available' => true,
            ],
            [
                'name' => 'Nissan Sentra Cabin Air Filter',
                'description' => 'Premium cabin air filter for Nissan Sentra 2013-2019. Removes allergens and pollutants from cabin air.',
                'brand' => 'NISSAN',
                'category' => 'HVAC',
                'model' => 'Sentra 2013-2019',
                'price' => 24.75,
                'condition' => 'New',
                'part_number' => 'CAF-SENTRA-2013',
                'stock_quantity' => 32,
                'is_available' => true,
            ],
        ];

        foreach ($carParts as $carPart) {
            CarPart::create($carPart);
        }
    }
}


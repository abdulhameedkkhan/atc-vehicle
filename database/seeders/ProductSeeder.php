<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Toyota Camry 2018 Engine 2.5L',
                'description' => 'Complete engine assembly from 2018 Toyota Camry. Low mileage, excellent condition. Includes all accessories and wiring harness.',
                'brand' => 'TOYOTA',
                'category' => 'Engines',
                'model' => 'Camry 2018',
                'price' => 2500.00,
                'condition' => 'Used',
                'part_number' => 'ENG-CAMRY-2018-25L',
                'stock_quantity' => 3,
                'is_available' => true,
            ],
            [
                'name' => 'Nissan Altima Front Bumper',
                'description' => 'OEM front bumper for Nissan Altima 2015-2018. Original paint, minor scratches. Ready to install.',
                'brand' => 'NISSAN',
                'category' => 'Body Parts',
                'model' => 'Altima 2015-2018',
                'price' => 350.00,
                'condition' => 'Used',
                'part_number' => 'BP-ALTIMA-FB-2015',
                'stock_quantity' => 5,
                'is_available' => true,
            ],
            [
                'name' => 'Honda Civic Transmission CVT',
                'description' => 'CVT transmission from 2017 Honda Civic. Tested and verified working condition. 45,000 km mileage.',
                'brand' => 'HONDA',
                'category' => 'Transmissions',
                'model' => 'Civic 2017',
                'price' => 1200.00,
                'condition' => 'Used',
                'part_number' => 'TRN-CIVIC-CVT-2017',
                'stock_quantity' => 2,
                'is_available' => true,
            ],
            [
                'name' => 'Mazda CX-5 Headlights Pair',
                'description' => 'Pair of LED headlights for Mazda CX-5 2016-2020. Original equipment, excellent condition.',
                'brand' => 'MAZDA',
                'category' => 'Body Parts',
                'model' => 'CX-5 2016-2020',
                'price' => 450.00,
                'condition' => 'Used',
                'part_number' => 'BP-CX5-HL-PAIR',
                'stock_quantity' => 4,
                'is_available' => true,
            ],
            [
                'name' => 'Mitsubishi Lancer Dashboard',
                'description' => 'Complete dashboard assembly for Mitsubishi Lancer 2010-2016. Includes all gauges and controls. Good condition.',
                'brand' => 'MITSUBISHI',
                'category' => 'Interior',
                'model' => 'Lancer 2010-2016',
                'price' => 280.00,
                'condition' => 'Used',
                'part_number' => 'INT-LANCER-DASH',
                'stock_quantity' => 2,
                'is_available' => true,
            ],
            [
                'name' => 'Suzuki Swift Radiator',
                'description' => 'Aluminum radiator for Suzuki Swift 2010-2017. No leaks, tested. Ready for installation.',
                'brand' => 'SUZUKI',
                'category' => 'Parts',
                'model' => 'Swift 2010-2017',
                'price' => 120.00,
                'condition' => 'Used',
                'part_number' => 'PRT-SWIFT-RAD',
                'stock_quantity' => 8,
                'is_available' => true,
            ],
            [
                'name' => 'Subaru Forester Rear Door',
                'description' => 'Complete rear door assembly for Subaru Forester 2014-2018. Includes glass, handles, and all hardware.',
                'brand' => 'SUBARU',
                'category' => 'Body Parts',
                'model' => 'Forester 2014-2018',
                'price' => 550.00,
                'condition' => 'Used',
                'part_number' => 'BP-FORESTER-RD',
                'stock_quantity' => 1,
                'is_available' => true,
            ],
            [
                'name' => 'Isuzu D-Max Turbocharger',
                'description' => 'Original turbocharger for Isuzu D-Max 2012-2017. Rebuilt and tested. Excellent performance.',
                'brand' => 'ISUZU',
                'category' => 'Parts',
                'model' => 'D-Max 2012-2017',
                'price' => 680.00,
                'condition' => 'Refurbished',
                'part_number' => 'PRT-DMAX-TURBO',
                'stock_quantity' => 3,
                'is_available' => true,
            ],
            [
                'name' => 'Lexus RX350 Front Grille',
                'description' => 'Chrome front grille for Lexus RX350 2013-2015. Original equipment, excellent condition with minor wear.',
                'brand' => 'LEXUS',
                'category' => 'Body Parts',
                'model' => 'RX350 2013-2015',
                'price' => 320.00,
                'condition' => 'Used',
                'part_number' => 'BP-RX350-GRILLE',
                'stock_quantity' => 2,
                'is_available' => true,
            ],
            [
                'name' => 'Daihatsu Terios Complete Engine',
                'description' => 'Complete 1.5L engine assembly for Daihatsu Terios 2006-2012. Low mileage, excellent running condition.',
                'brand' => 'DAIHATSU',
                'category' => 'Engines',
                'model' => 'Terios 2006-2012',
                'price' => 1800.00,
                'condition' => 'Used',
                'part_number' => 'ENG-TERIOS-15L',
                'stock_quantity' => 1,
                'is_available' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

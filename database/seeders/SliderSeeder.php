<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            [
                'title' => 'Japanese Used Vehicles & Auto Parts Export',
                'description' => 'Sourcing Quality Japanese Vehicles and Genuine Parts Worldwide Since 2016',
                'image' => 'sliders/slide1.jpg',
                'button_text_1' => 'Browse Parts',
                'button_link_1' => '/products',
                'button_text_2' => 'Get Quote',
                'button_link_2' => '/contact',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Premium Quality Japanese Vehicles',
                'description' => '350+ Cars, Trucks & Heavy Equipment in Stock - All Inspected & Certified',
                'image' => 'sliders/slide2.jpg',
                'button_text_1' => 'View Vehicle Parts',
                'button_link_1' => '/products',
                'button_text_2' => 'WhatsApp Us',
                'button_link_2' => 'https://wa.me/819048043444',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Genuine Japanese Auto Parts',
                'description' => 'Engines, Transmissions & Body Parts - Direct from Japan\'s Top Dealers',
                'image' => 'sliders/slide3.jpg',
                'button_text_1' => 'Browse Parts',
                'button_link_1' => '/car-parts',
                'button_text_2' => 'Get Quote',
                'button_link_2' => '/contact',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HairAtHomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run(): void
{
    $services = [
        // Blow Dry Section
        ['category_group' => 'Blow Dry', 'service_name' => 'Short Hair', 'price_standard' => '140'],
        ['category_group' => 'Blow Dry', 'service_name' => 'Medium Length', 'price_standard' => '160 - 180'],
        ['category_group' => 'Blow Dry', 'service_name' => 'Long Hair', 'price_standard' => '200 - 250'],
        
        // Hair Cut Section
        ['category_group' => 'Hair Cut', 'service_name' => 'All Hair Length Styling', 'price_standard' => '150'],
        ['category_group' => 'Hair Cut', 'service_name' => 'Children Hair Cut', 'price_standard' => '75'],
        
        // Hair Colour Section
        [
            'category_group' => 'Hair Colour', 
            'service_name' => 'Roots Re-Touch', 
            'price_majirel' => '360', 
            'price_inoa' => '370'
        ],
        [
            'category_group' => 'Hair Colour', 
            'service_name' => 'Short Hair Colour', 
            'price_majirel' => '385', 
            'price_inoa' => '395'
        ],

        // Treatments
        [
            'category_group' => 'Magic Hair Treatments', 
            'service_name' => 'Blow Out (120 mins)', 
            'price_standard' => 'from 1,000'
        ],
    ];

    foreach ($services as $service) {
        \App\Models\HairAtHome::create($service);
    }
}
}

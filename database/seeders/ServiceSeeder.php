<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $essentials = Category::where('name', 'Essentials')->first();

        $services = [
            [
                'category_id' => $essentials->id,
                'name' => 'Essential Manicure',
                'description' => 'Classic manicure service',
                'vat_applicable' => true
            ],
            [
                'category_id' => $essentials->id,
                'name' => 'Essential Pedicure',
                'description' => 'Classic pedicure service',
                'vat_applicable' => true
            ],
            [
                'category_id' => $essentials->id,
                'name' => 'Essential Manicure & Pedicure',
                'description' => null,
                'vat_applicable' => true
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}


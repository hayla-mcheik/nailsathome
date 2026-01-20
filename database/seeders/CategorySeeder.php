<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Essentials'],
            ['name' => 'French'],
            ['name' => 'Our Little Angels'],
            ['name' => 'Pretty Nail Arts'],
            ['name' => 'Long & Lasting'],
            ['name' => 'Buff It'],
            ['name' => 'Pamper Your Hands'],
            ['name' => 'Spoil Your Feet'],
            ['name' => 'Gorgeous Nails'],
            ['name' => 'Waxing'],
            ['name' => 'Massage'],
            ['name' => 'Facials'],
            ['name' => 'Hair At Home'],
            ['name' => 'Packages'],
            ['name' => 'Special Occasions'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

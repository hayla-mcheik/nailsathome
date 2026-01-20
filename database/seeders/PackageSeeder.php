<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run()
    {
        $packages = [
            [
                'name' => 'Happy Client Package',
                'description' => 'Purchase 8 classic manicures & pedicures and receive 2 complimentary transportation charges.',
                'price' => null
            ],
            [
                'name' => 'Pamper Me Package',
                'description' => 'Select any 4 services and receive 2 complimentary transportation charges.',
                'price' => 1000
            ],
            [
                'name' => 'Special Birthday Gift',
                'description' => 'Facial, massage, manicure & pedicure combo',
                'price' => null
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}


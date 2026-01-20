<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceVariantSeeder extends Seeder
{
    public function run()
    {
        $manicure = Service::where('name', 'Essential Manicure')->first();

        ServiceVariant::create([
            'service_id' => $manicure->id,
            'duration' => 40,
            'price' => 150,
            'unit' => 'service'
        ]);

        $pedicure = Service::where('name', 'Essential Pedicure')->first();

        ServiceVariant::create([
            'service_id' => $pedicure->id,
            'duration' => 45,
            'price' => 200,
            'unit' => 'service'
        ]);
    }
}

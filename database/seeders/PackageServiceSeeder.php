<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageServiceSeeder extends Seeder
{
    public function run()
    {
        $package = Package::where('name', 'Pamper Me Package')->first();

        $services = Service::whereIn('name', [
            'Deep Cleansing Facial',
            'Organic Hair Treatment',
            'Body Scrub with Dead Sea Mud',
            'Full Body Waxing'
        ])->get();

        foreach ($services as $service) {
            $package->services()->attach($service->id);
        }
    }
}

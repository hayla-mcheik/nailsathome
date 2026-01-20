<?php

namespace Database\Seeders;

use App\Models\TransportationArea;
use App\Models\TransportationFee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportationSeeder extends Seeder
{
    public function run(): void
    {
        // Clear tables first to avoid duplicates if you run it multiple times
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        TransportationArea::truncate();
        TransportationFee::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $locations = [
            ['name' => 'Al Aweer', 'fee' => 100], ['name' => 'Al Badia', 'fee' => 40],
            ['name' => 'Al Diyafa', 'fee' => 45], ['name' => 'Al Habab', 'fee' => 200],
            ['name' => 'Al Jadaf', 'fee' => 50], ['name' => 'Al Khail Gate', 'fee' => 60],
            ['name' => 'Al Maha Resort', 'fee' => 250], ['name' => 'Al Nahda', 'fee' => 60],
            ['name' => 'Al Qusais', 'fee' => 50], ['name' => 'Al Quoz', 'fee' => 60],
            ['name' => 'Al Sufouh', 'fee' => 70], ['name' => 'Al Twar', 'fee' => 50],
            ['name' => 'Al Warqa', 'fee' => 50], ['name' => 'Al Wasl', 'fee' => 50],
            ['name' => 'Arabian Ranches', 'fee' => 80], ['name' => 'Bur Dubai', 'fee' => 50],
            ['name' => 'Business Bay', 'fee' => 50], ['name' => 'Deira', 'fee' => 50],
            ['name' => 'Discovery Gardens', 'fee' => 90], ['name' => 'Dubai Marina', 'fee' => 80],
            ['name' => 'Dubai Silicon Oasis', 'fee' => 60], ['name' => 'Emirates Hills', 'fee' => 80],
            ['name' => 'Executive Towers', 'fee' => 50], ['name' => 'Falcon City', 'fee' => 60],
            ['name' => 'Festival City', 'fee' => 45], ['name' => 'Garden City', 'fee' => 80],
            ['name' => 'Green Community (DIP)', 'fee' => 100], ['name' => 'Green Community (Motor City)', 'fee' => 80],
            ['name' => 'International City', 'fee' => 60], ['name' => 'Jebel Ali', 'fee' => 100],
            ['name' => 'Jumeirah 1, 2, 3', 'fee' => 60], ['name' => 'Jumeirah Beach Residence', 'fee' => 90],
            ['name' => 'Jumeirah Islands', 'fee' => 80], ['name' => 'Jumeirah Lake Towers', 'fee' => 80],
            ['name' => 'Jumeirah Park', 'fee' => 80], ['name' => 'Jumeirah Village Circle/Triangle', 'fee' => 80],
            ['name' => 'Mamzar - Hamriya', 'fee' => 50], ['name' => 'Mamzar - Sharjah', 'fee' => 100],
            ['name' => 'Meydan', 'fee' => 60], ['name' => 'Mirdif', 'fee' => 50],
            ['name' => 'Motor City', 'fee' => 80], ['name' => 'Muhaisnah', 'fee' => 50],
            ['name' => 'Mudon', 'fee' => 80], ['name' => 'Mushrif', 'fee' => 80],
            ['name' => 'Nad Al Sheba', 'fee' => 55], ['name' => 'Oud Al Muteena', 'fee' => 50],
            ['name' => 'Oud Metha', 'fee' => 50], ['name' => 'Rashidiya', 'fee' => 40],
            ['name' => 'Remraam', 'fee' => 100], ['name' => 'Satwa', 'fee' => 50],
            ['name' => 'Silicon Oasis', 'fee' => 60], ['name' => 'Sports City', 'fee' => 80],
        ];

        foreach ($locations as $location) {
            $area = TransportationArea::create([
                'name' => $location['name']
            ]);

            TransportationFee::create([
                'transportation_area_id' => $area->id,
                'fee' => $location['fee']
            ]);
        }
    }
}
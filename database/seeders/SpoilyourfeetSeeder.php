<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpoilyourfeetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $treatments = [
            [
                'title' => 'The Unique Scrub',
                'subtitle' => 'Pamper Your Feet',
                'duration' => '45 mins',
                'price' => 140,
                'description' => 'Rushed off your feet? Then relax at home for 45 minutes and let us scrub your worries away. Our special almond sugar scrub polishing cream is gently massaged into your skin, exfoliating unwanted dry areas and replenishing essential nutrients and vitamins. Special care for extra special feet.',
                'advance_booking' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Bathing Beauty',
                'subtitle' => 'Pamper Your Feet',
                'duration' => '50 mins',
                'price' => 160,
                'description' => 'If you\'re always on the go it\'s time to take it slow. Treat your feet to a delightful paraffin treatment. After a soothing massage with cooling lotion, your feet are dipped into a wax bath or paraffin booties which soothes the rough edges. After 50 minutes, you\'ll be feeling footloose and fancy-free!',
                'advance_booking' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Signature Collection',
                'subtitle' => 'Pamper Your Feet',
                'duration' => '75 mins',
                'price' => 195,
                'description' => 'It\'s time to put your best foot forward and indulge in the ultimate pedicure experience. Combining the twin effects of The Unique Scrub and The Bathing Beauty, your feet are in for double the pleasure. From your legs down to your toes, this is one treatment you\'ll wish would never end.',
                'advance_booking' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Nails At Home SPA (Feet)',
                'subtitle' => 'Pamper Your Feet',
                'duration' => '75 mins',
                'price' => 200,
                'description' => 'The world\'s most popular pedicure experience is brought right to your home for over an hour of blissful relaxation. The answer to cracked heels, pinched toes and sun-backed ankles lies in an all-inclusive treatment that features an exfoliating foot scrub, a luxurious collagen mask and an enjoyable healing massage to finish off the pampering.',
                'advance_booking' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Magic Pedicure',
                'subtitle' => 'Pamper Your Feet',
                'duration' => '65 mins',
                'price' => 210,
                'description' => 'If you are suffering from uncomfortable calluses, cracked heels, peeling or rough scratchy skin, this treatment leaves your skin with the best results. It works magic to keep your feet looking healthy and soft.',
                'advance_booking' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Using DB::table ensures it goes to the correct table name from your migration
        DB::table('spoil_your_feets')->insert($treatments);
    }
}
<?php

namespace Database\Seeders;

use App\Models\SpaTreatment;
use Illuminate\Database\Seeder;

class SpaTreatmentSeeder extends Seeder
{
    public function run(): void
    {
        $treatments = [
            [
                'subtitle' => 'Pamper Your Hands',
                'title' => 'The Classic Scrub',
                'duration' => '45 mins',
                'description' => "If you’ve lost your soft touch, this is the treatment for you. Our special vitamin rich almond sugar scrub is the first of its kind to combine sugar and almond for the best result. This unique therapy exfoliates, cleans and replenishes vital vitamins and nutrients, leaving your hands looking lovelier than ever. Pure bliss!",
                'price' => 130,
                'advance_booking' => false,
            ],
            [
                'subtitle' => 'Pamper Your Hands',
                'title' => 'The Relaxing Dip',
                'duration' => '50 mins',
                'description' => "Bring your tired, overworked hands back to life with this soothing paraffin treatment. After being bathed with lotion, your hands are dipped into a warm, delightful aromatic paraffin bath or paraffin mitts for a few minutes of luxurious relaxation. When they emerge, your skin will be smoother than ever and your hands will have never felt more relaxed.",
                'price' => 160,
                'advance_booking' => true,
            ],
            [
                'subtitle' => 'Pamper Your Hands',
                'title' => 'The Perfect Experience',
                'duration' => '60 mins',
                'description' => "It’s an hour of cleansing power! This unique combination of the Classic Scrub and The Relaxing Dip is the Nails At Home perfect experience, leaving your hands feeling softer and looking better than you can possibly imagine. The ultimate indulgence.",
                'price' => 185, // Updated from brochure image
                'advance_booking' => true,
            ],
            [
                'subtitle' => 'Pamper Your Hands',
                'title' => 'The Nails At Home SPA',
                'duration' => '55 mins',
                'description' => "The world’s most popular manicure experience is brought right to your home for over an hour of blissful relaxation. The answer to dry and dehydrated hands lies in an all-inclusive treatment that features an exfoliating hands scrub, a luxurious collagen mask and an enjoyable healing massage to finish off the pampering.",
                'price' => 200, // Updated from brochure image
                'advance_booking' => false,
            ],
        ];

        foreach ($treatments as $treatment) {
            SpaTreatment::updateOrCreate(['title' => $treatment['title']], $treatment);
        }
    }
}
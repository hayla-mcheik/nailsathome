<?php

namespace Database\Seeders;

use App\Models\BrochureService;
use Illuminate\Database\Seeder;

class BrochureRemainingSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // --- GORGEOUS NAILS (Technicals - Dark Theme) ---
            [
                'category_type' => 'nails', 'theme_color' => 'dark',
                'side_title' => 'Gorgeous Nails', 'section_title' => 'Technicals',
                'title' => 'Acrylic / Gel Full Set', 'price' => 350, 'duration' => '90 mins',
                'description' => 'Professional extensions using premium gel or acrylic for a glamorous, high-end look.'
            ],
            [
                'category_type' => 'nails', 'theme_color' => 'dark',
                'side_title' => 'Gorgeous Nails', 'section_title' => 'Technicals',
                'title' => 'Acrylic / Gel Refill', 'price' => 250, 'duration' => '60 mins',
                'description' => 'Perfect maintenance for your existing extensions to keep them looking flawless.'
            ],
            [
                'category_type' => 'nails', 'theme_color' => 'dark',
                'side_title' => 'Gorgeous Nails', 'section_title' => 'Technicals',
                'title' => 'Overlay on Natural Nails', 'price' => 250, 'duration' => '60 mins',
                'description' => 'Strengthening layer of gel or acrylic on your natural nails without adding length.'
            ],
            [
                'category_type' => 'nails', 'theme_color' => 'dark',
                'side_title' => 'Gorgeous Nails', 'section_title' => 'Technicals',
                'title' => 'Nail Repair', 'price' => 30, 'duration' => '15 mins',
                'description' => 'Quick repair for a single cracked or broken nail.'
            ],

            // --- WHAT YOU KNEAD? (Massage - Grey Theme) ---
            [
                'category_type' => 'massage', 'theme_color' => 'grey',
                'side_title' => 'What You Knead?', 'section_title' => 'Massage Therapy',
                'title' => 'The Aromatherapy Massage', 'price' => 250, 'duration' => '60 mins',
                'description' => 'A holistic treatment using pure essential oils to improve physical and emotional well-being.'
            ],
            [
                'category_type' => 'massage', 'theme_color' => 'grey',
                'side_title' => 'What You Knead?', 'section_title' => 'Massage Therapy',
                'title' => 'Deep Tissue Massage', 'price' => 300, 'duration' => '60 mins',
                'description' => 'Focuses on realigning deeper layers of muscles and connective tissue for chronic stiffness.'
            ],
            [
                'category_type' => 'massage', 'theme_color' => 'grey',
                'side_title' => 'What You Knead?', 'section_title' => 'Massage Therapy',
                'title' => 'The Healer (Back & Shoulders)', 'price' => 150, 'duration' => '30 mins',
                'description' => 'An express massage targeting specific problem areas for quick relief.'
            ],

            // --- LEAVE ME SOFT (Waxing - Orange Theme) ---
            [
                'category_type' => 'waxing', 'theme_color' => 'orange',
                'side_title' => 'Leave Me Soft', 'section_title' => 'Waxing & Threading',
                'title' => 'Full Arms', 'price' => 85, 'duration' => '25 mins',
                'description' => 'Complete hair removal for arms using our specialist sanitary techniques.'
            ],
            [
                'category_type' => 'waxing', 'theme_color' => 'orange',
                'side_title' => 'Leave Me Soft', 'section_title' => 'Waxing & Threading',
                'title' => 'Full Legs', 'price' => 120, 'duration' => '40 mins',
                'description' => 'Smooth, hair-free legs with our premium wax application.'
            ],
            [
                'category_type' => 'waxing', 'theme_color' => 'orange',
                'side_title' => 'Leave Me Soft', 'section_title' => 'Waxing & Threading',
                'title' => 'Full Body Waxing', 'price' => 450, 'duration' => '120 mins',
                'description' => 'The ultimate smooth experience from head to toe.'
            ],
            [
                'category_type' => 'waxing', 'theme_color' => 'orange',
                'side_title' => 'Leave Me Soft', 'section_title' => 'Waxing & Threading',
                'title' => 'Eyebrow Threading', 'price' => 40, 'duration' => '15 mins',
                'description' => 'Precision eyebrow shaping using traditional threading methods.'
            ],

            // --- HAIR AT HOME (Hair - Gold Theme) ---
            [
                'category_type' => 'hair', 'theme_color' => 'gold',
                'side_title' => 'Hair At Home', 'section_title' => 'Styling & Cuts',
                'title' => 'Short Hair Blow Dry', 'price' => 140, 'duration' => '45 mins',
                'description' => 'Treat your hair to one of our exclusive blow dry services.'
            ],
            [
                'category_type' => 'hair', 'theme_color' => 'gold',
                'side_title' => 'Hair At Home', 'section_title' => 'Styling & Cuts',
                'title' => 'Long Hair Blow Dry', 'price' => 180, 'duration' => '60 mins',
                'description' => 'Professional styling for long hair in the comfort of your home.'
            ],
            [
                'category_type' => 'hair', 'theme_color' => 'gold',
                'side_title' => 'Hair At Home', 'section_title' => 'Styling & Cuts',
                'title' => 'Hair Cut', 'price' => 200, 'duration' => '60 mins',
                'description' => 'Precision cutting by our expert hair stylists.'
            ],
            [
                'category_type' => 'hair', 'theme_color' => 'gold',
                'side_title' => 'Hair At Home', 'section_title' => 'Styling & Cuts',
                'title' => 'Root Touch-Up', 'price' => 250, 'duration' => '90 mins',
                'description' => 'Quick gray coverage and root maintenance (application only).'
            ],
        ];

        foreach ($data as $item) {
            BrochureService::create($item);
        }
    }
}
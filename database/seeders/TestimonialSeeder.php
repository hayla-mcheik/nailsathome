<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Sarah Ahmed',
                'feedback'    => 'The most professional home salon service in Dubai. My manicure lasted for weeks, and the technician was so punctual and polite.',
                'rating'      => 5,
                'image'       => 'testimonials/client1.jpg',
            ],
            [
                'client_name' => 'Elena Rodriguez',
                'feedback'    => 'I love the Hair At Home service! Having a professional stylist come to my villa saved me so much time. Highly recommend the Blow Out.',
                'rating'      => 5,
                'image'       => 'testimonials/client2.jpg',
            ],
            [
                'client_name' => 'Mariam Al-Maktoum',
                'feedback'    => 'A truly luxury experience. The spa treatment turned my living room into a sanctuary. Very professional and clean.',
                'rating'      => 5,
                'image'       => 'testimonials/client3.jpg',
            ],
            [
                'client_name' => 'Jessica Thompson',
                'feedback'    => 'Wonderful deep relaxation massage. It is so convenient to have these high-quality treatments available at home after a long workday.',
                'rating'      => 4,
                'image'       => 'testimonials/client4.jpg',
            ],
        ];

        foreach ($testimonials as $item) {
            Testimonial::create($item);
        }
    }
}
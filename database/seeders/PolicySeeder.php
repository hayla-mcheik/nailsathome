<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Policy;

class PolicySeeder extends Seeder
{
    public function run(): void
    {
        $policies = [
            [
                'title' => 'Gift Vouchers',
                'content' => 'Treat your friends and family to the Nails at Home experience with one of our "Prepare to be Pampered" Gift Vouchers. Whatever the occasion, they\'ll love the personal care and attention they\'ll be receiving inside their very own homes. The Nails at Home gift vouchers are available in a choice of price ranges. (Vouchers are valid for 6 months from date of purchase).',
                'sort_order' => 1
            ],
            [
                'title' => 'Cancellation Policy',
                'content' => 'To ensure a smooth operation, Please notify us of any cancellation at least three hours in advance. Cancellations made upon arrivals at location of client will incur 100% charge of the Service.',
                'sort_order' => 2
            ],
            [
                'title' => 'Waiting Time',
                'content' => 'Upon arrival at the clients location, we kindly ask that services commence promptly; any delay exceeding 15 minutes will result in the start of charges. We value your time and appreciate your cooperation.',
                'sort_order' => 3
            ],
            [
                'title' => 'Important Information',
                'content' => 'Please inform your technician if you have any special medical condition.',
                'sort_order' => 4
            ],
            [
                'title' => 'Transportation',
                'content' => 'Transportation charges are not included in the services and will be charged depending on each service coverage zone.',
                'sort_order' => 5
            ],
            [
                'title' => 'Credit Card Payment Facility',
                'content' => 'Experience seamless transactions with our efficient credit card processing machines, ensuring swift and secure payments. Furthermore, we are pleased to offer the convenience of bank transfers as an alternative payment method.',
                'sort_order' => 6
            ],
        ];

        foreach ($policies as $policy) {
            Policy::updateOrCreate(
                ['title' => $policy['title']], 
                $policy
            );
        }
    }
}
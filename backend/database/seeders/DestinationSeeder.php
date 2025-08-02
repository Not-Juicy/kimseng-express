<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $destinations = [
            [
                'name' => 'Phnom Penh',
                'description' => 'The capital and largest city of Cambodia, known for its rich history, royal palaces, and vibrant culture.',
                'image_url' => '/images/phnompenh.jpg',
                'express_price' => 25.00,
                'standard_price' => 15.00,
                'economy_price' => 10.00,
                'is_active' => true,
            ],
            [
                'name' => 'Siem Reap',
                'description' => 'Home to the magnificent Angkor Wat temple complex and gateway to the ancient Khmer Empire.',
                'image_url' => '/images/siemreap.jpg',
                'express_price' => 30.00,
                'standard_price' => 20.00,
                'economy_price' => 15.00,
                'is_active' => true,
            ],
            [
                'name' => 'Battambang',
                'description' => 'A charming provincial town known for its French colonial architecture and bamboo train.',
                'image_url' => '/images/battambang.jpg',
                'express_price' => 35.00,
                'standard_price' => 25.00,
                'economy_price' => 18.00,
                'is_active' => true,
            ],
            [
                'name' => 'Sihanoukville',
                'description' => 'Coastal city with beautiful beaches and islands, perfect for relaxation and water activities.',
                'image_url' => '/images/sihanoukville.jpg',
                'express_price' => 40.00,
                'standard_price' => 30.00,
                'economy_price' => 22.00,
                'is_active' => true,
            ],
            [
                'name' => 'Kampot',
                'description' => 'Famous for its pepper plantations and colonial architecture, located along the Kampot River.',
                'image_url' => '/images/kompot.jpg',
                'express_price' => 45.00,
                'standard_price' => 35.00,
                'economy_price' => 25.00,
                'is_active' => true,
            ],
            [
                'name' => 'Kep',
                'description' => 'Small coastal town known for its fresh seafood, crab market, and peaceful atmosphere.',
                'image_url' => '/images/kep.jpg',
                'express_price' => 50.00,
                'standard_price' => 40.00,
                'economy_price' => 30.00,
                'is_active' => true,
            ],
            [
                'name' => 'Mondulkiri',
                'description' => 'Highland province known for its waterfalls, elephant sanctuaries, and ethnic minority villages.',
                'image_url' => '/images/mondulkiri.jpg',
                'express_price' => 60.00,
                'standard_price' => 45.00,
                'economy_price' => 35.00,
                'is_active' => true,
            ],
        ];

        foreach ($destinations as $destination) {
            Destination::create($destination);
        }
    }
}

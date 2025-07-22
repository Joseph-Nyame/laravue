<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $property1 = Property::create([
            'title' => 'Cozy Downtown Apartment',
            'description' => 'A modern 2-bedroom apartment in the heart of the city.',
            'price' => 250000.00,
            'address' => '123 Main St',
            'city' => 'New York',
            'state' => 'NY',
            'zip_code' => '10001',
            'bedrooms' => 2,
            'bathrooms' => 1,
            'square_feet' => 800,
            'status' => 'active',
            'user_id' => $user->id,
        ]);

        Image::create([
            'property_id' => $property1->id,
            'url' => 'https://example.com/images/apartment1.jpg',
            'caption' => 'Living room view',
        ]);
        Image::create([
            'property_id' => $property1->id,
            'url' => 'https://example.com/images/apartment2.jpg',
            'caption' => 'Kitchen area',
        ]);

        $property2 = Property::create([
            'title' => 'Spacious Suburban House',
            'description' => 'A beautiful 4-bedroom house with a large backyard.',
            'price' => 450000.00,
            'address' => '456 Oak Ave',
            'city' => 'Albany',
            'state' => 'NY',
            'zip_code' => '12203',
            'bedrooms' => 4,
            'bathrooms' => 2,
            'square_feet' => 2000,
            'status' => 'active',
            'user_id' => $user->id,
        ]);

        Image::create([
            'property_id' => $property2->id,
            'url' => 'https://example.com/images/house1.jpg',
            'caption' => 'Front exterior',
        ]);
    }
}
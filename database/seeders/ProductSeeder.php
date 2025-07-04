<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::create([
            'name' => 'Hydrating Face Cream',
            'category_id' => 1,
            'price' => 29.99,
            'description' => 'A gentle, hydrating cream for all skin types with natural ingredients.',
            'stock' => 100,
        ]);

        \App\Models\Product::create([
            'name' => 'Anti-Aging Serum',
            'category_id' => 1,
            'price' => 45.50,
            'description' => 'Advanced anti-aging serum with retinol and vitamin C for youthful skin.',
            'stock' => 75,
        ]);

        \App\Models\Product::create([
            'name' => 'Gentle Cleanser',
            'category_id' => 1,
            'price' => 18.99,
            'description' => 'Daily gentle cleanser that removes impurities without stripping natural oils.',
            'stock' => 120,
        ]);

        \App\Models\Product::create([
            'name' => 'Matte Lipstick',
            'category_id' => 2,
            'price' => 22.00,
            'description' => 'Long-lasting matte lipstick in beautiful shades for every occasion.',
            'stock' => 85,
        ]);

        \App\Models\Product::create([
            'name' => 'Eyeshadow Palette',
            'category_id' => 2,
            'price' => 38.50,
            'description' => 'Professional eyeshadow palette with 18 stunning shades and mirror.',
            'stock' => 60,
        ]);

        \App\Models\Product::create([
            'name' => 'Mascara Volume',
            'category_id' => 2,
            'price' => 24.99,
            'description' => 'Volumizing mascara that adds length and volume to your lashes.',
            'stock' => 95,
        ]);

        \App\Models\Product::create([
            'name' => 'Floral Perfume',
            'category_id' => 3,
            'price' => 65.00,
            'description' => 'Elegant floral fragrance with notes of rose, jasmine, and vanilla.',
            'stock' => 45,
        ]);

        \App\Models\Product::create([
            'name' => 'Citrus Cologne',
            'category_id' => 3,
            'price' => 55.50,
            'description' => 'Fresh citrus cologne perfect for daily wear and special occasions.',
            'stock' => 70,
        ]);

        \App\Models\Product::create([
            'name' => 'Night Repair Cream',
            'category_id' => 1,
            'price' => 52.99,
            'description' => 'Intensive night repair cream that works while you sleep.',
            'stock' => 55,
        ]);

        \App\Models\Product::create([
            'name' => 'BB Cream',
            'category_id' => 2,
            'price' => 28.00,
            'description' => 'All-in-one BB cream with SPF protection and natural coverage.',
            'stock' => 80,
        ]);

        \App\Models\Product::create([
            'name' => 'Luxury Body Lotion',
            'category_id' => 1,
            'price' => 32.50,
            'description' => 'Rich body lotion with shea butter and essential oils for soft skin.',
            'stock' => 65,
        ]);

        \App\Models\Product::create([
            'name' => 'Elegant Eau de Parfum',
            'category_id' => 3,
            'price' => 78.00,
            'description' => 'Sophisticated eau de parfum with oriental and woody notes.',
            'stock' => 40,
        ]);
    }
}

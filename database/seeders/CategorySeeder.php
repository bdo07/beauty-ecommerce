<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::create(['name' => 'Skincare', 'description' => 'Produits pour la peau']);
        \App\Models\Category::create(['name' => 'Makeup', 'description' => 'Maquillage naturel']);
        \App\Models\Category::create(['name' => 'Fragrance', 'description' => 'Parfums éco-responsables']);
    }
}

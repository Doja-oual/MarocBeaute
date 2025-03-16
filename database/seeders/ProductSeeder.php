<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'title' => 'Crème hydratante visage',
                'description' => 'Crème naturelle pour une peau douce et hydratée.',
                'price' => 29.99,
                'discounted_price' => 24.99,
                'reference' => Str::random(10),
                'image' => 'creme_visage.jpg',
                'qte' => 100,
                'qte_order' => 0,
                'in_stock' => true,
                'id_sub_catg' => 1, // Assurez-vous que cette sous-catégorie existe
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Shampoing bio',
                'description' => 'Shampoing nourrissant aux huiles essentielles.',
                'price' => 19.99,
                'discounted_price' => 15.99,
                'reference' => Str::random(10),
                'image' => 'shampoing_bio.jpg',
                'qte' => 150,
                'qte_order' => 5,
                'in_stock' => true,
                'id_sub_catg' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Huile d’argan pure',
                'description' => 'Huile d’argan 100% bio pour le visage et les cheveux.',
                'price' => 39.99,
                'discounted_price' => 34.99,
                'reference' => Str::random(10),
                'image' => 'huile_argan.jpg',
                'qte' => 200,
                'qte_order' => 10,
                'in_stock' => true,
                'id_sub_catg' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

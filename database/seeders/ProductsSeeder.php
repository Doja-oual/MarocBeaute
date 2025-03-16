<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'title' => 'Savon Noir Traditionnel',
                'description' => 'Un savon naturel exfoliant, parfait pour le hammam.',
                'price' => 49.99,
                'stock' => 100,
                'category_id' => 1, // Assurez-vous que cette catégorie existe
                'sub_category_id' => 1, // Assurez-vous que cette sous-catégorie existe
                'image' => 'savon_noir.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Huile d’Argan Bio',
                'description' => 'Huile d’argan pure, riche en vitamine E pour la peau et les cheveux.',
                'price' => 129.99,
                'stock' => 50,
                'category_id' => 1, 
                'sub_category_id' => 2, 
                'image' => 'huile_argan.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Crème Hydratante au Miel',
                'description' => 'Une crème hydratante naturelle enrichie au miel.',
                'price' => 89.99,
                'stock' => 75,
                'category_id' => 2, 
                'sub_category_id' => 3, // Pas de sous-catégorie associée
                'image' => 'creme_miel.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
       
        $tags = [
            'Argan', 'Rooibos', 'Ghassoul', 'Henné', 'Eau de rose',
            'Huile d\'argan', 'Miel', 'Aloe Vera', 'Masque au Ghassoul', 'Savon Noir',
            'Anti-âge', 'Hydratation', 'Soin de la peau', 'Peau sensible', 'Soin capillaire',
            'Anti-acné', 'Éclat du teint', 'Exfoliant', 'Sérum', 'Crème solaire',
            'Bio', 'Vegan', 'Cruelty-free', 'Zéro déchet', 'Sans parabène', 'Sans sulfates', 'Écologique',
            'Peau grasse', 'Peau sèche', 'Peau mixte', 'Peau mature', 'Peau sensible',
            'Cheveux secs', 'Cheveux gras', 'Cheveux bouclés', 'Cheveux frisés', 'Cheveux fins',
            'Relaxation', 'Anti-stress', 'Bien-être', 'Spa à domicile', 'Détente'
        ];

        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'nom' => $tag,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

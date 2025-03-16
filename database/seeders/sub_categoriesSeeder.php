<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class sub_categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sub_categories')->insert([
            ['name' => 'Smartphones', 'category_id' => 1],
            ['name' => 'Laptops', 'category_id' => 1],
            ['name' => 'Clothing', 'category_id' => 2],
            ['name' => 'Furniture', 'category_id' => 3],
        ]);
    }
}

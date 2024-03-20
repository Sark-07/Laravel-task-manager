<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Categories::factory(3)->create();
        Categories::create([
            'category_name' => 'feature'
        ]);
        Categories::create([
            'category_name' => 'bug'
        ]);
        Categories::create([
            'category_name' => 'issue'
        ]);
        Categories::create([
            'category_name' => 'urgent'
        ]);
        
    }
}

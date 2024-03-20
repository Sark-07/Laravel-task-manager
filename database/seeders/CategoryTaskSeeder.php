<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Tasks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTaskSeeder extends Seeder
{
    
    public function run(): void
    {
        $tasks = Tasks::all();
        foreach ($tasks as $task) {
           
            $task->categories()->attach(Categories::inRandomOrder()->take(rand(1, 3))->pluck('id'));

        }
    }
}

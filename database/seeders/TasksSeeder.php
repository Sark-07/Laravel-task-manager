<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Tasks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tasks::factory(5)->create();
        // Tasks::factory(5)
        //     ->hasAttached(Categories::factory()->count(3))
        //     ->create();
    }
}

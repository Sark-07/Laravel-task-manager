<?php

namespace Database\Seeders;

use App\Models\Tasks;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = Tasks::all();
        foreach ($tasks as $task) {
           
            $task->user()->attach(User::inRandomOrder()->take(rand(1, 5))->pluck('id'));

        }
    }
}

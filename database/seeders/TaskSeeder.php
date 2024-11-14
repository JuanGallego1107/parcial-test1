<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::insert([
            ['name' => 'Comprar alimentos'],
            ['name' => 'Lavar el auto'],
            ['name' => 'Estudiar Laravel'],
            ['name' => 'Hacer ejercicio'],
            ['name' => 'Leer un libro'],
        ]);
    }
}

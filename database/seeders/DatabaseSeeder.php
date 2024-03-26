<?php

namespace Database\Seeders;

use App\Models\Progression;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)
             ->has(Progression::factory()->count(3))
             ->create();


    }
}

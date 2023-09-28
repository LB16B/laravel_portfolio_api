<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Food;
use App\Models\Recipe;
use App\Models\CategoryAge;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CategoryAge::factory(3)->create();
        
        User::factory(5)->has(
            Recipe::factory(1)->has(
                Food::factory(5)
            )
        )->create();
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Food;
use App\Models\Recipe;
use App\Models\CategoryAge;
use App\Models\Manual;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\CategoryFood;
use App\Models\Like;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategoryAgeSeeder::class,
            CategoryFoodSeeder::class,
        ]);

        User::factory(5)->has(
            Recipe::factory(10)
                ->has(Food::factory(5))
                ->has(Review::factory(4))
                ->has(Manual::factory(5))
                ->has(Like::factory(5))
        )->create();
        
        // User::factory(5)->has(
        //     Recipe::factory(1)->has(
        //         Food::factory(5),
        //     )
        // )->create();
    }
}

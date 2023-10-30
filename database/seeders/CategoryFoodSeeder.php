<?php

namespace Database\Seeders;

use App\Models\CategoryFood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_foods')->insert([
            [
                'id' => 1,
                'name' => '主食 - ご飯',
                'filename' => 'category_food1.png'
            ],
            [
                'id' => 2,
                'name' => '主食 - パン',
                'filename' => 'category_food2.png'
            ],
            [
                'id' => 3,
                'name' => '主食 - 麺',
                'filename' => 'category_food3.png'
            ],
            [
                'id' => 4,
                'name' => 'おかず - 野菜',
                'filename' => 'category_food4.png'
            ],
            [
                'id' => 5,
                'name' => 'おかず - 芋',
                'filename' => 'category_food5.png'
            ],
            [
                'id' => 6,
                'name' => 'おかず - 豆腐・豆',
                'filename' => 'category_food6.png'
            ],
            [
                'id' => 7,
                'name' => 'おかず - 乳製品',
                'filename' => 'category_food7.png'
            ],
            [
                'id' => 8,
                'name' => 'おかず - 卵',
                'filename' => 'category_food8.png'
            ],
            [
                'id' => 9,
                'name' => 'おかず - 魚',
                'filename' => 'category_food9.png'
            ],
            [
                'id' => 10,
                'name' => 'おかず - 肉',
                'filename' => 'category_food10.png'
            ],
            [
                'id' => 11,
                'name' => 'その他 - スープ',
                'filename' => 'category_food11.png'
            ],
            [
                'id' => 12,
                'name' => 'その他 - デザート・おやつ',
                'filename' => 'category_food12.png'
            ],
        ]);
    }
}

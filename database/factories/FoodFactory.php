<?php

namespace Database\Factories;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class IngredientFakerProvider extends Base
{
    protected static $ingredient = [
        'ブロッコリー',
        'かぼちゃ',
        '絹豆腐',
        '大根',
        '水溶き片栗粉',
        'にんじん',
        '国産米粉',
        'えだまめ',
        '食パン',
        'さつまいも',
        'かれい切り身',
        'ごはん',
        '水',
        '白菜',
        'ほうれん草',
        'コーン',
        '白身魚',
        'かれい',
        'バナナ',
        'キャベツ',
        'じゃがいも',
        'しらす',
        'りんご',
        '冷凍うどん',
        'だし汁',
        '玉ねぎ',
        'オクラ',
        '溶いた粉ミルク',
        '小松菜',
        'きゅうり',
        'レタス',
        '昆布',
        'トマト',
        'かぶ',
        '鮭',
        'かつおぶし',
    ];

    public static function ingredient()
    {
        return static::randomElement(static::$ingredient);
    }
}

class AmountFakerProvider extends Base {

    protected static $amount = [
        '10g',
        '15g',
        '20g',
        '25g',
        '30g',
        '35g',
        '40g',
        '45g',
        '50g',
        '60g',
        '70g',
        '80g',
        '90g',
        '100g',
        '小さじ1/2',
        '小さじ1',
        '小さじ2',
        '小さじ1/2',
        'ひとつまみ',
        '1/4カップ',
        '大さじ2',
        '大さじ1強',
        '少量',
    ];

    public static function amount()
    {
        return static::randomElement(static::$amount);
    }
}

class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new IngredientFakerProvider($this->faker));
        $this->faker->addProvider(new AmountFakerProvider($this->faker));

        return [
            'ingredient' => IngredientFakerProvider::ingredient(),
            'amount' => AmountFakerProvider::amount(),
        ];
    }
}

<?php

namespace Database\Factories;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */

//  タイトル
class RecipeTitleFakerProvider extends Base
{
    protected static $recipeTitles = [
        // 5 ~ 6月
        'りんごのパン粥',
        'さつまいもとトマトとりんご',
        'かぶのコーンポタージュ',
        'ミルクスイートポテト',
        'イチゴスムージー',
        'おさかなそぼろ',
        '鯛のとろとろ',
        'さつまいもごはん',
        // 7 ~ 8月
        '大根の煮物',
        'キウイミルク',
        'にんじんとトマトの茶わん蒸し',
        'かぶとポテトのミルク煮',
        'たまごとカッテージちーじのそぼろ',
        'ぱんでホワイトシチュー',
        'さつまいもボール',
        'レンジでなすのお浸し',
        'かぼちゃのミルクあんかけ',
        'ツナ缶の卵とじ',
        'かぶとしらすの青のりがけ',
        // 9 ~ 11月
        'ツナときゅうりのそうめん',
        'ふりかけおやき',
        '鯖缶のトマト煮',
        'ツナ入りポテトサラダ',
        'マカロニのミルクスープ',
        '米粉の台湾カステラ',
        'レンジで簡単バナナケーキ',
        '豚のとろとろ煮物',
        'なすとにべのミルクあんかけ',
        'ブロッコリーと鶏むね肉のだし煮',
        '小松菜とバナナのミルクプリン',
        'あげないかぼちゃコロッケ',
        '枝豆とブロコリーのミルクドリア',
        'コーン豆腐ハンバーグ',
        '豆腐とブロッコリーの青のりオムレツ',
        'かぶとつなのレンジスープ',
    ];

    public static function recipeTitle()
    {
        return static::randomElement(static::$recipeTitles);
    }
}

// サムネイル
class RecipeImageFakerProvider extends Base {

    protected static $recipeImages = [
        '2023-05-31EOuIKmkx8WGPS1F.jpg',
        '2023-05-31El5YInDnnM4wbDn.jpg',
        '2023-05-31GEferH5RxwXa7GP.jpg',
        '2023-05-31mVEzjIjgCb8AK6u.jpg',
        '2023-05-31O3a9TFX9Iv6mFxH.jpg',
        '2023-05-31PUjhSqWqJjlYIlQ.jpg',
        '2023-05-31rkchqq9hPJUDRJy.jpg',
        '2023-05-31SX2dbKw0oqW1c1b.jpg',
        '2023-05-31WCBbPq9uavj6oGa.jpg',
        '2023-05-31yTzOM5wgl0xmIDd.jpg',
        '2023-05-31z5htyKAoOlLgx9r.jpg',
        '2023-05-311FELS3SZNwbBXot.jpg',
        '2023-05-314esJMmx7a3AdMNf.jpg',
        '2023-05-31cNj3iaOi7Gq8xUZ.jpg',
        '2023-05-31BAmFtz7cRMBzVSj.jpg',
        '2023-05-31aQDkFqSc3LV7c8b.jpg',
        '2023-06-058W43SYt5erj9NJr.jpg',
        '2023-06-058Sk1bx7Lw4h15yy.jpg',
        '2023-06-058ffSJ1wLt6dlofR.jpg',
        '2023-06-05zneD2rfDwq4nEYs.jpg',
        '2023-06-05uLZny1lMQ8h7RO1.jpg',
        '2023-06-05UaHcCejSDypPvjN.jpg',
        '2023-06-05FAr7GgVfh0oN0Ob.jpg',
        '2023-06-05lFVVtZ1dMug8cLi.jpg',
        '2023-06-05pQBHhBjj574LdJ7.jpg',
        '2023-06-05QD1FgVmMi9K1L8i.jpg',
    ];

    public static function recipeImage()
    {
        return static::randomElement(static::$recipeImages);
    }
}


class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new RecipeTitleFakerProvider($this->faker));
        $this->faker->addProvider(new RecipeImageFakerProvider($this->faker));

        return [
            'title' => RecipeTitleFakerProvider::recipeTitle(),
            'time' => rand(30, 500),
            'price' => rand(100, 3000),
            'filename' => RecipeImageFakerProvider::recipeImage(),
        ];
    }
}

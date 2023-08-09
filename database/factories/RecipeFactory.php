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
        '20230531_1FELS3SZNwbBXot.jpg',
        '20230531_AmFtz7cRMBzVSj.jpg',        
        '20230531_cNj3iaOi7Gq8xUZ.jpg',
        '20230531_El5YInDnnM4wbDn.jpg',
        '20230531_EOuIKmkx8WGPS1F.jpg',
        '20230531_GEferH5RxwXa7GP.jpg',
        '20230531_O3a9TFX9Iv6mFxH.jpg',
        '20230531_mVEzjIjgCb8AK6u.jpg',
        '20230531_PUjhSqWqJjlYIlQ.jpg',
        '20230531_WCBbPq9uavj6oGa.jpg',
        '20230531_SX2dbKw0oqW1c1b.jpg',
        '20230531_rkchqq9hPJUDRJy.jpg',
        '20230531_yTzOM5wgl0xmIDd.jpg',
        '20230605_8ffSJ1wLt6dlofR.jpg',
        '20230605_QD1FgVmMi9K1L8i.jpg',
        '20230605_zneD2rfDwq4nEYs.jpg',
        '20230607_ZIZE3fzj8YZ6bAB.jpg',
        '202305314_esJMmx7a3AdMNf.jpg',
        '20230611_AI3JDL1rA9R08PB.jpg',
        '20230606_YJ8Wd1AetMDf7Qj.jpg',
        '20230606_WdSdLyw31AOIKBR.jpg',
        '20230605_UaHcCejSDypPvjN.jpg',
        '20230605_Sk1bx7Lw4h15yy.jpg',
        '20230605_pQBHhBjj574LdJ7.jpg',
        '20230605_FAr7GgVfh0oN0Ob.jpg',
        '20230605_lFVVtZ1dMug8cLi.jpg',
        '20230531a_QDkFqSc3LV7c8b.jpg',
        '20230531_z5htyKAoOlLgx9r.jpg',
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

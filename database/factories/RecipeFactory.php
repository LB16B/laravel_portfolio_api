<?php

namespace Database\Factories;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */

class RecipeFakerProvider extends Base
{
    // protected 非公開だが、子クラスへの継承は可能
    // static 静的。どのインスタンスでもメソッドやプロパティを呼び出せる
    protected static $recipeTitle = [
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
        return static::randomElement(static::$recipeTitle);
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
        $this->faker->addProvider(new RecipeFakerProvider($this->faker));

        return [
            'title' => RecipeFakerProvider::recipeTitle(),
            'time' => rand(30, 500),
            'price' => rand(100, 3000)
        ];
    }
}

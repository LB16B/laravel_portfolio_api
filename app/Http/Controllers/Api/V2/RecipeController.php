<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\Recipe;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Http\Resources\RecipeResource;

use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;


class RecipeController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Recipe::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // collection リスト形式でデータを格納できるラッパー
        // return RecipeResource::collection(auth()->user()->recipes()->get());
        return RecipeResource::collection(Recipe::all());
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecipeRequest $request)
    {
        $recipe = $request->user()->recipes()->create($request->validated());

            // 新しいレシピのIDを取得
            $newRecipeId = $recipe->id;

        // return RecipeResource::make($recipe);
        return response()->json(['recipe_id' => $newRecipeId]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // collection リスト形式でデータを格納できるラッパー
        // return RecipeResource::collection(auth()->user()->recipes()->get());
        return RecipeResource::collection(Recipe::all());
    }
    // public function show($id)
    // {
    //     // 特定のIDに対応するレシピをデータベースから取得
    //     $recipe = Recipe::find($id);
    
    //     // レシピが存在しない場合、エラーを返すか適切に処理してください
    //     if (!$recipe) {
    //         return response()->json(['message' => 'レシピが見つかりませんでした'], 404);
    //     }
    
    //     // レシピをリソースに変換して返す
    //     return new RecipeResource($recipe);
    // }
    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Recipe $recipe)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        $recipe->update($request->validated());

        return RecipeResource::make($recipe);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        // onContent 成功ステータスレスポンスコード
        // リクエストが成功したものの、クライアントが現在のページから移動する必要がない
        return response()->noContent();
    }
}

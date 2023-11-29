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
        return RecipeResource::collection(Recipe::all());
    }

    public function store(StoreRecipeRequest $request)
    {
        $recipe = $request->user()->recipes()->create($request->validated());

            $newRecipeId = $recipe->id;

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

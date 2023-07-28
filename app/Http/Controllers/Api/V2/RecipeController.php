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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // collection リスト形式でデータを格納できるラッパー
        return RecipeResource::collection(auth()->user()->recipes()->get());
        // return RecipeResource::collection(Recipe::all());
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
        $recipe = $request->user()->recipes->create($request->validated());
        // $recipe = Recipe::create($request->validated());

        return RecipeResource::make($recipe);
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        return RecipeResource::make($recipe);
    }

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

<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\CategoryFood;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryFoodRequest;
use App\Http\Requests\UpdateCategoryFoodRequest;
use App\Http\Resources\CategoryFoodResource;

class CategoryFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoryFoodResource::collection(CategoryFood::all());
    }

    /**
     * Store a newly created resource in storFood.
     */
    public function store(StoreCategoryFoodRequest $request)
    {
        $categoryFood = CategoryFood::create($request->validated());

        return CategoryFoodResource::make($categoryFood);
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryFood $categoryFood)
    {
        return CategoryFoodResource::make($categoryFood);
    }

    /**
     * Update the specified resource in storFood.
     */
    public function update(UpdateCategoryFoodRequest $request, CategoryFood $categoryFood)
    {
        $categoryFood->update($request->validated());

        return CategoryFoodResource::make($categoryFood);
    }

    /**
     * Remove the specified resource from storFood.
     */
    public function destroy(CategoryFood $categoryFood)
    {
        $categoryFood->delete();

        return response()->noContent();
    }
}

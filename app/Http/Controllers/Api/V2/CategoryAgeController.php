<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\CategoryAge;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryAgeRequest;
use App\Http\Requests\UpdateCategoryAgeRequest;
use App\Http\Resources\CategoryAgeResource;

class CategoryAgeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoryAgeResource::collection(CategoryAge::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryAgeRequest $request)
    {
        $categoryAge = CategoryAge::create($request->validated());

        return CategoryAgeResource::make($categoryAge);
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryAge $categoryAge)
    {
        return CategoryAgeResource::make($categoryAge);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryAgeRequest $request, CategoryAge $categoryAge)
    {
        $categoryAge->update($request->validated());

        return CategoryAgeResource::make($categoryAge);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryAge $categoryAge)
    {
        $categoryAge->delete();

        return response()->noContent();
    }
}

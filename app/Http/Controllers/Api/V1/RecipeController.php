<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Recipe;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Http\Resources\RecipeResource;

use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;


class RecipeController extends Controller
{
    public function index()
    {
        return RecipeResource::collection(Recipe::all());
    }

    public function show(Recipe $recipe)
    {
        return RecipeResource::make($recipe);
    }
}

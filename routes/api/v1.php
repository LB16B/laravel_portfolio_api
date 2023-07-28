<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\RecipeController;
use Illuminate\Http\Request;

Route::prefix('v1')->group(function () {
    Route::apiResource('/recipes', RecipeController::class);
});
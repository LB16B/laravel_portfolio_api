<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V2\FoodController;
use App\Http\Controllers\Api\V1\RecipeController;
use App\Http\Controllers\RecipeFileUploadController;

Route::prefix('v1')->group(function () {
    Route::apiResource('/recipes', RecipeController::class);
    // Route::apiResource('/foods', FoodController::class);
});

// Route::prefix('v1')->group(function () {
//     Route::post('/upload', [RecipeFileUploadController::class, 'upload']);
// });


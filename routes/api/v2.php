<?php

use App\Http\Controllers\Api\V2\FoodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V2\RecipeController;
use App\Http\Controllers\Api\V2\ReviewController;
use App\Http\Controllers\RecipeFileUploadController;
use App\Http\Controllers\Api\V2\CategoryAgeController;
use App\Http\Controllers\Api\V2\ChangePasswordController;

Route::prefix('v2')->group(function () {
    Route::apiResource('/recipes', RecipeController::class);
    Route::apiResource('/foods', FoodController::class);
    Route::apiResource('/category_ages', CategoryAgeController::class);
    Route::apiResource('/reviews', ReviewController::class);
    Route::post('/change_password', [ChangePasswordController::class, 'changePassword']);
});

Route::prefix('v2')->group(function () {
    Route::post('/upload', [RecipeFileUploadController::class, 'upload']);
});



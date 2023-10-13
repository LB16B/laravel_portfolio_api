<?php

use App\Http\Controllers\Api\V2\FoodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V2\RecipeController;
use App\Http\Controllers\Api\V2\ReviewController;
use App\Http\Controllers\RecipeFileUploadController;
use App\Http\Controllers\Api\V2\CategoryAgeController;
use App\Http\Controllers\Api\V2\ChangePasswordController;
use App\Http\Controllers\Api\V2\ManualController;
use App\Http\Controllers\Api\V2\UserProfileController;
use App\Http\Controllers\Api\V2\CategoryFoodController;
use App\Http\Controllers\Api\V2\LikeController;

Route::prefix('v2')->group(function () {
    Route::apiResource('/recipes', RecipeController::class);
    Route::apiResource('/foods', FoodController::class);
    Route::apiResource('/category_ages', CategoryAgeController::class);
    Route::apiResource('/category_foods', CategoryFoodController::class);
    Route::apiResource('/likes', LikeController::class);
    Route::apiResource('/reviews', ReviewController::class);
    Route::apiResource('/manuals', ManualController::class);
    Route::put('/change_password', [ChangePasswordController::class, 'changePassword']);
    Route::put('/user_profile', [UserProfileController::class, 'update']);
});

Route::prefix('v2')->group(function () {
    Route::post('/upload', [RecipeFileUploadController::class, 'upload']);
});



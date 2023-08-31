<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V2\RecipeController;
use App\Http\Controllers\RecipeFileUploadController;

Route::prefix('v2')->group(function () {
    Route::apiResource('/recipes', RecipeController::class);
});

Route::prefix('v2')->group(function () {
    Route::post('/upload', [RecipeFileUploadController::class, 'upload']);
});

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


Route::get('/test/{fileName}', function ($filename) {
    $path = public_path('recipe_images/' . $filename);

    if (file_exists($path)) {
        $file = file_get_contents($path);
        $type = mime_content_type($path);
        $base64 = base64_encode($file);

        return Response::json([
            'data' => 'data:' . $type . ';base64,' . $base64,
        ]);
    } else {
        abort(404);
    }
});
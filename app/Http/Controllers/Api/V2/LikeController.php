<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\Like;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\LikeResource;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return LikeResource::collection(Like::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLikeRequest $request)
    {
        $like = Like::create($request->validated());

        return LikeResource::make($like);
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        return LikeResource::make($like);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLikeRequest $request, Like $like)
    {
        $like->update($request->validated());

        return LikeResource::make($like);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        $like->delete();

        return response()->noContent();
    }
}
<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\Manual;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManualRequest;
use App\Http\Requests\UpdateManualRequest;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\ManualResource;

class ManualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ManualResource::collection(Manual::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreManualRequest $request)
    {
        $manual = Manual::create($request->validated());

        return ManualResource::make($manual);
    }

    /**
     * Display the specified resource.
     */
    public function show(Manual $manual)
    {
        return ManualResource::make($manual);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateManualRequest $request, Manual $manual)
    {
        $manual->update($request->validate());

        return ManualResource::make($manual);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manual $manual)
    {
        $manual->delete();

        return response()->noContent();
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DestinationController extends Controller
{
    public function index(): JsonResponse
    {
        $destinations = Destination::where('is_active', true)->get();

        return response()->json([
            'destinations' => $destinations
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:destinations',
            'description' => 'required|string',
            'image_url' => 'nullable|url|max:500',
            'express_price' => 'required|numeric|min:0',
            'standard_price' => 'required|numeric|min:0',
            'economy_price' => 'required|numeric|min:0',
        ]);

        $destination = Destination::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_url' => $request->image_url,
            'express_price' => $request->express_price,
            'standard_price' => $request->standard_price,
            'economy_price' => $request->economy_price,
            'is_active' => true,
        ]);

        return response()->json([
            'message' => 'Destination created successfully',
            'destination' => $destination
        ], 201);
    }

    public function show(Destination $destination): JsonResponse
    {
        return response()->json([
            'destination' => $destination
        ]);
    }

    public function update(Request $request, Destination $destination): JsonResponse
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255|unique:destinations,name,' . $destination->id,
            'description' => 'sometimes|required|string',
            'image_url' => 'nullable|url|max:500',
            'express_price' => 'sometimes|required|numeric|min:0',
            'standard_price' => 'sometimes|required|numeric|min:0',
            'economy_price' => 'sometimes|required|numeric|min:0',
            'is_active' => 'sometimes|boolean',
        ]);

        $destination->update($request->only([
            'name', 'description', 'image_url', 'express_price', 
            'standard_price', 'economy_price', 'is_active'
        ]));

        return response()->json([
            'message' => 'Destination updated successfully',
            'destination' => $destination
        ]);
    }

    public function destroy(Destination $destination): JsonResponse
    {
        $destination->delete();

        return response()->json([
            'message' => 'Destination deleted successfully'
        ]);
    }
}

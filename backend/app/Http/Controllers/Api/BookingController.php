<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BookingController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $bookings = $request->user()->bookings()->with('user')->latest()->get();

        return response()->json([
            'bookings' => $bookings
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'destination' => 'required|string|max:255',
            'service_type' => 'required|in:express,standard,economy',
            'pickup_date' => 'required|date|after:today',
            'pickup_time' => 'required|date_format:H:i',
            'pickup_address' => 'required|string|max:500',
            'delivery_address' => 'required|string|max:500',
            'description' => 'nullable|string',
            'weight' => 'nullable|numeric|min:0',
        ]);

        $booking = $request->user()->bookings()->create([
            'destination' => $request->destination,
            'service_type' => $request->service_type,
            'pickup_date' => $request->pickup_date,
            'pickup_time' => $request->pickup_time,
            'pickup_address' => $request->pickup_address,
            'delivery_address' => $request->delivery_address,
            'description' => $request->description,
            'weight' => $request->weight,
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Booking created successfully',
            'booking' => $booking->load('user')
        ], 201);
    }

    public function show(Request $request, Booking $booking): JsonResponse
    {
        // Ensure user can only view their own bookings
        if ($booking->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json([
            'booking' => $booking->load('user')
        ]);
    }

    public function update(Request $request, Booking $booking): JsonResponse
    {
        // Ensure user can only update their own bookings
        if ($booking->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'destination' => 'sometimes|required|string|max:255',
            'service_type' => 'sometimes|required|in:express,standard,economy',
            'pickup_date' => 'sometimes|required|date|after:today',
            'pickup_time' => 'sometimes|required|date_format:H:i',
            'pickup_address' => 'sometimes|required|string|max:500',
            'delivery_address' => 'sometimes|required|string|max:500',
            'description' => 'nullable|string',
            'weight' => 'nullable|numeric|min:0',
            'status' => 'sometimes|in:pending,confirmed,in_transit,delivered,cancelled',
        ]);

        $booking->update($request->only([
            'destination', 'service_type', 'pickup_date', 'pickup_time',
            'pickup_address', 'delivery_address', 'description', 'weight', 'status'
        ]));

        return response()->json([
            'message' => 'Booking updated successfully',
            'booking' => $booking->load('user')
        ]);
    }

    public function destroy(Request $request, Booking $booking): JsonResponse
    {
        // Ensure user can only delete their own bookings
        if ($booking->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $booking->delete();

        return response()->json([
            'message' => 'Booking deleted successfully'
        ]);
    }
}

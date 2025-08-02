<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\DestinationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/destinations', [DestinationController::class, 'index']);
Route::get('/destinations/{destination}', [DestinationController::class, 'show']);
Route::post('/contact', [ContactController::class, 'store']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    
    // Bookings
    Route::apiResource('bookings', BookingController::class);
    
    // Admin routes (you can add middleware for admin check later)
    Route::get('/contact-messages', [ContactController::class, 'index']);
    Route::get('/contact-messages/{contactMessage}', [ContactController::class, 'show']);
    Route::patch('/contact-messages/{contactMessage}/read', [ContactController::class, 'markAsRead']);
    
    Route::apiResource('destinations', DestinationController::class)->except(['index', 'show']);
}); 
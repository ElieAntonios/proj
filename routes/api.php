<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// User Authentication Routes
Route::post('/register', [UserController::class, 'register']); // Register a new user
Route::post('/login', [UserController::class, 'login']); // Log in an existing user

// Protected Routes (Require Authentication)
Route::middleware('auth:sanctum')->group(function () {
    
    // User Profile
    Route::get('/user', [UserController::class, 'profile']); // Get authenticated user profile
    
    // Drug Routes
    Route::get('/drugs', [DrugController::class, 'index']); // List all available drugs
    Route::get('/drugs/{drug_id}', [DrugController::class, 'show']); // Get details of a specific drug

    // Order Routes
    Route::post('/orders', [OrderController::class, 'store']); // Place a new order
    Route::get('/orders', [OrderController::class, 'index']); // Get order history for authenticated user
});

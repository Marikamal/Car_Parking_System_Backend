<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ZoneController;
use App\Models\Parking;

/*VehiclesController
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('profile', [ProfileController::class, 'show']);
    Route::put('profile', [ProfileController::class, 'updateProfile']);
    Route::put('password', [ProfileController::class, 'updatePassword']);
    Route::apiResource('vehicles', VehiclesController::class);
    Route::get('parkings', [ParkingController::class, 'index']);//getActiveParkings
    Route::get('parkings/history', [ParkingController::class, 'history']);
    Route::post('parkings/start', [ParkingController::class, 'start']);//startParking
    Route::get('parkings/{parking}', [ParkingController::class, 'show']);

    Route::bind('activeParking', function ($id) {
        return Parking::where('id', $id)->active()->firstOrFail();
    });

    Route::put('parkings/{activeParking}', [ParkingController::class, 'stop']);//stopParkings

    // Route::post('auth/logout', Auth\LogoutController::class);
});


Route::get('zones', [ZoneController::class, 'index']);//getZones



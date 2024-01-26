<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RoomController;


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

Route::resource('property', PropertyController::class);
Route::resource('room', RoomController::class);

Route::get('room/property/{propertyId}', [RoomController::class, 'showByPropertyID']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

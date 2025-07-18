<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\NgoController;
use App\Http\Controllers\RouteInfoController;
use App\Http\Controllers\SupplyRequestController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WareHouseController;
use App\Http\Controllers\WareHouseItemController;
use App\Models\SupplyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login']);
Route::post('change-passwords', [AuthController::class, 'changePassword']);
Route::post('logOut', [AuthController::class, 'logOut']);
Route::apiResource('users', UserController::class);
Route::apiResource('items', ItemController::class);
Route::apiResource('ngos', NgoController::class);
Route::apiResource('warehouse-items', WareHouseItemController::class);
Route::apiResource('warehouses', WareHouseController::class);
Route::apiResource('trucks', TruckController::class);
Route::apiResource('deliveries', DeliveryController::class);
Route::apiResource('supply-requests', SupplyRequestController::class);

<?php

use App\Http\Controllers\API\AccountsController;
use App\Http\Controllers\API\AuthenticatedSessionController;
use App\Http\Controllers\API\ModuleController;
use App\Http\Controllers\API\OrdersController;
use App\Http\Controllers\API\OrganizationController;
use App\Http\Controllers\API\PermiseController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\TokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\VoicebotController;

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

Route::middleware('auth:api')->group(function () {
    Route::prefix('v3')->group(function () {
        Route::post('Sign_off', [AuthenticatedSessionController::class, 'logout']);
    });
});
Route::prefix('v3')->group(function () {
    Route::post('login', [AuthenticatedSessionController::class, 'login']);
});
Route::middleware(['auth:api'])->group(function () {
});
Route::middleware(['auth:api'])->prefix('v3')->group( function () {
   
    Route::prefix('accounts')->where(['id' => '[0-9]+'])->group(function () {
        Route::get('', [AccountsController::class, 'index'])->middleware(['permission:accounts']);
    });
    Route::prefix('order')->where(['id' => '[0-9]+'])->group(function () {
        Route::get('', [OrdersController::class, 'index'])->middleware(['permission:order']);
        Route::post('', [OrdersController::class, 'store'])->middleware(['permission:order']);
    });
});




/**
 * crud de roles 
 * crud de usuarios con rol  orgnaizacion - administrador  
 * 
 * 
 */

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\RegistrarController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\RegistrarUsersController;
use App\Http\Controllers\Api\RegistrarCaseChargesController;

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

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('registrars', RegistrarController::class);

        // Registrar Users
        Route::get('/registrars/{registrar}/users', [
            RegistrarUsersController::class,
            'index',
        ])->name('registrars.users.index');
        Route::post('/registrars/{registrar}/users', [
            RegistrarUsersController::class,
            'store',
        ])->name('registrars.users.store');

        // Registrar Case Charges
        Route::get('/registrars/{registrar}/case-charges', [
            RegistrarCaseChargesController::class,
            'index',
        ])->name('registrars.case-charges.index');
        Route::post('/registrars/{registrar}/case-charges', [
            RegistrarCaseChargesController::class,
            'store',
        ])->name('registrars.case-charges.store');

        Route::apiResource('users', UserController::class);
    });

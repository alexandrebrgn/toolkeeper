<?php

use App\Http\Controllers\v1;
use App\Http\Controllers\v1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::prefix('v1')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
//    Route::post('operation,' ,[V1\OperationController::class, 'create'])->name('operation');

    Route::middleware('auth:sanctum')->group(function () {
        Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
            return $request->user();
        });
        // Tool
        Route::get('tool/serialId/{tool:serialId}', [v1\ToolController::class, 'showBySerialId']);
        Route::apiResource('tool', v1\ToolController::class);
        // Operation
        Route::apiResource('operation', V1\OperationController::class);
        // Category
        Route::resource('category', V1\CategoryController::class);
        // User
        Route::apiResource('user', V1\UserController::class);

        Route::resource('tag', V1\TagController::class);
        Route::resource('datatool', V1\DatatoolController::class);
        Route::resource('datacategory', V1\DatacategoryController::class);
        Route::get('operators', [AuthController::class, 'operators']);
    });
});

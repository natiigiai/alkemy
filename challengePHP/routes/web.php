<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [ApplicationController::class, 'indexApp']);
Route::get('/apps', [ApplicationController::class, 'indexApp']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/me/apps/{id}', [ApplicationController::class,'appsPorRol']);

Route::middleware(['auth:sanctum', 'verified'])->get('/newApp',[ApplicationController::class, 'create']);

Route::middleware(['auth:sanctum', 'verified'])->post('/newApp',[ApplicationController::class, 'store']);

Route::middleware(['auth:sanctum', 'verified'])->get('/editApp/{id}',[ApplicationController::class,'edit']);

Route::middleware(['auth:sanctum', 'verified'])->put('/editApp',[ApplicationController::class,'update']);

Route::middleware(['auth:sanctum', 'verified'])->get('/deleteApp/{id}',[ApplicationController::class, 'confirm']);

Route::middleware(['auth:sanctum', 'verified'])->delete('/deleteApp',[ApplicationController::class, 'destroy']);

Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}',[ApplicationController::class,'show']);

Route::middleware(['auth:sanctum', 'verified'])->post('/buy', [ApplicationController::class, 'buy']);

Route::middleware(['auth:sanctum', 'verified'])->get('/me/categories', [CategoryController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/showApps/{id}', [CategoryController::class, 'show']);


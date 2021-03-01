<?php

use App\Http\Controllers\ApplicationController;
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

Route::get('/', function () {
    return view('welcome');
});

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

Route::middleware(['auth:sanctum', 'verified'])->get('/showApp/{id}',[ApplicationController::class,'show']);


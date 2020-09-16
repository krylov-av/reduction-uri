<?php

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
})->name('Home');

Route::middleware(['guest'])->group(function(){
    Route::get('/login',[\App\Http\Controllers\AuthController::class,'login'])
        ->name('login');
    Route::post('/login',[\App\Http\Controllers\AuthController::class,'attempt']);
});

Route::middleware(['auth'])->group(function(){
    Route::get('/logout',[\App\Http\Controllers\AuthController::class,'logout'])
        ->name('logout');

    Route::resources([
        'links' => \App\Http\Controllers\LinkController::class
    ]);
    Route::get('/{page:shortlink}',[\App\Http\Controllers\LinkController::class,'goToPage']);
});



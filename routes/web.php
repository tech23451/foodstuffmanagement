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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\FoodController::class, 'index'])->name('home');

use App\Http\Controllers\FoodController;
Route::controller(FoodController::class)->middleware('auth')->group(function () {
    Route::get('create', 'add')->name('food.add');
    Route::post('create', 'create')->name('food.create');
    Route::get('food', 'index')->name('food.index');
    Route::get('edit/{id}', 'edit')->name('food.edit');
    Route::post('edit', 'update')->name('food.update');
});



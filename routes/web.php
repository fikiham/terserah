<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BenefitController;

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

Route::get('add', [PlayerController::class, 'create'])->name('player.create');
Route::get('add_item', [ItemController::class, 'create'])->name('player.create_item');
Route::get('add_benefit', [BenefitController::class, 'create'])->name('player.create_benefit');

Route::post('store', [PlayerController::class, 'store'])->name('player.store');
Route::post('store_item', [ItemController::class, 'store'])->name('player.store_item');
Route::post('store_benefit', [BenefitController::class, 'store'])->name('player.store_benefit');
Route::post('search', [PlayerController::class, 'searchSum'])->name('player.search_summary');

Route::get('/home', [PlayerController::class, 'index'])->name('player.index');
Route::get('/item', [ItemController::class, 'index'])->name('player.item_index');
Route::get('/benefit', [BenefitController::class, 'index'])->name('player.index_benefit');
Route::get('/summary', [PlayerController::class, 'indexSum'])->name('player.index_summary');

Route::get('edit/{id}', [PlayerController::class, 'edit'])->name('player.edit');
Route::get('edit_item/{id}', [ItemController::class, 'edit'])->name('player.edit_item');
Route::get('edit_benefit/{id}', [BenefitController::class, 'edit'])->name('player.edit_benefit');

Route::post('update/{id}', [PlayerController::class,'update'])->name('player.update');
Route::post('update_item/{id}', [ItemController::class,'update'])->name('player.update_item');
Route::post('update_benefit/{id}', [BenefitController::class,'update'])->name('player.update_benefit');

Route::post('delete/{id}', [PlayerController::class,'delete'])->name('player.delete');
Route::post('delete_item/{id}', [ItemController::class,'delete'])->name('player.delete_item');
Route::post('delete_benefit/{id}', [BenefitController::class,'delete'])->name('player.delete_benefit');

Route::post('hdelete/{id}', [PlayerController::class,'hdelete'])->name('player.hdelete');
Route::post('hdelete_item/{id}', [ItemController::class,'hdelete'])->name('player.hdelete_item');
Route::post('hdelete_benefit/{id}', [BenefitController::class,'hdelete'])->name('player.hdelete_benefit');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

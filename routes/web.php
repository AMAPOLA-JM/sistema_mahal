<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DetailsIncomingController;
use App\Http\Controllers\IncomingsController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\NoteDetailsController;
use App\Http\Controllers\NoteSalesController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\UsersController;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return redirect('/home');
});

Route::group([], function(){ //group for notesales
    Route::get('notesales', [NoteSalesController::class, 'index'])->name('notesales.index')->middleware('auth');
    Route::get('notesales/newsell/{tipo}', [NoteSalesController::class, 'create'])->name('notesales.create')->middleware('auth');
});

Route::group([], function(){ //group for items
    Route::get('items', [ItemsController::class, 'index'])->name('items.index')->middleware('auth');
    Route::get('items/nuevo', [ItemsController::class, 'create'])->name('items.create')->middleware('auth');
    Route::get('items/destroy/{id}', [ItemsController::class, 'destroy'])->name('items.destroy')->middleware('auth');
});

Route::group([], function(){ //group for clients
    Route::get('clients', [ClientsController::class, 'index'])->name('clients.index')->middleware('auth');
    Route::get('clients/nuevo', [ClientsController::class, 'create'])->name('clients.create')->middleware('auth');
});

Route::group([], function(){ //group for incomings
    Route::get('incomings', [IncomingsController::class, 'index'])->name('incomings.index')->middleware('auth');
    Route::get('incomings/nuevo', [IncomingsController::class, 'create'])->name('incomings.create')->middleware('auth');
});

Route::group([], function(){ //group for incomings
    Route::get('suppliers', [SuppliersController::class, 'index'])->name('suppliers.index')->middleware('auth');
    Route::get('suppliers/nuevo', [SuppliersController::class, 'create'])->name('suppliers.create')->middleware('auth');
});

Route::group([], function(){ //group for incomings
    Route::get('brands', [BrandsController::class, 'index'])->name('brands.index')->middleware('auth');
    Route::get('brands/nuevo', [BrandsController::class, 'create'])->name('brands.create')->middleware('auth');
});

Route::group([], function(){ //group for incomings
    Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index')->middleware('auth');
    Route::get('categories/nuevo', [CategoriesController::class, 'create'])->name('categories.create')->middleware('auth');
});

Route::group([], function(){ //group for incomings
    Route::get('settings', function(){
        return view('settings.settings');
    })->name('settings.index')->middleware('auth');
    Route::get('settings/pass', function(){
        return view('settings.changePass');
    })->name('settings.change.pass')->middleware('auth');
});

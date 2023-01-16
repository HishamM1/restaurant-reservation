<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TableController;
use App\Models\Category;

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
    return view('index');
})->name('home');

Route::get('/reservation', [ReservationController::class, 'reserve']);


Route::get('/admin', [AdminController::class, 'index']);
Route::post('/login', [AdminController::class, 'login']);
Route::get('/admin/dashboard', [AdminController::class, 'show'])->middleware('auth')->name('dashboard');
Route::get('/logout', [AdminController::class, 'logout'])->middleware('auth');

Route::get('/admin/reservations', [ReservationController::class, 'index'])->middleware('auth')->name('reservations');
Route::post('/reservation/store', [ReservationController::class, 'store']);
// route to change reservation status
Route::post('/admin/reservations/{id}/status', [ReservationController::class, 'status'])->middleware('auth');
Route::post('/admin/reservations/{id}/delete', [ReservationController::class, 'destroy'])->middleware('auth');


Route::get('/admin/tables', [TableController::class, 'index'])->middleware('auth')->name('tables');
Route::get('/admin/addtable', [TableController::class, 'addtable'])->middleware('auth');
Route::post('/admin/addtable/store', [TableController::class, 'store'])->middleware('auth');
Route::post('/admin/tables/{id}/delete', [TableController::class, 'destroy'])->middleware('auth');
Route::get('/admin/tables/{id}/edit', [TableController::class, 'edit'])->middleware('auth');
Route::post('/admin/tables/{id}/update', [TableController::class, 'update'])->middleware('auth');


Route::get('/admin/categories', [CategoryController::class, 'index'])->middleware('auth')->name('categories');
Route::get('/admin/addcategory', [CategoryController::class, 'addCategory'])->middleware('auth');
Route::post('/admin/addcategory/store', [CategoryController::class, 'store'])->middleware('auth');
Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->middleware('auth');
Route::post('/admin/categories/{id}/delete', [CategoryController::class, 'destroy'])->middleware('auth');

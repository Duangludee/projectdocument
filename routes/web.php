<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::prefix('document')->group(function () {

    Route::get('/', [App\Http\Controllers\DocumentListController::class, 'index'])->name('document.index');
    Route::get('/create', [App\Http\Controllers\DocumentListController::class, 'create'])->name('document.create');
    Route::post('/store', [App\Http\Controllers\DocumentListController::class, 'store'])->name('document.store');

    Route::get('/{id}/edit', [App\Http\Controllers\DocumentListController::class, 'edit'])->name('document.edit');

});

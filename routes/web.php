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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function (){
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('document')->group(function () {

        Route::get('/', [App\Http\Controllers\DocumentListController::class, 'index'])->name('document.index');
        Route::get('/create', [App\Http\Controllers\DocumentListController::class, 'create'])->name('document.create');
        Route::post('/store', [App\Http\Controllers\DocumentListController::class, 'store'])->name('document.store');

        Route::get('/{id}/edit', [App\Http\Controllers\DocumentListController::class, 'edit'])->name('document.edit');
        Route::put('/{docId}/update', [App\Http\Controllers\DocumentListController::class, 'update'])->name('document.update');
        Route::put('/{docId}/comfirm', [App\Http\Controllers\DocumentListController::class, 'update_showImage'])->name('doc.update');
    });

    Route::prefix('setting')->group(function () {

        Route::prefix('information')->group(function () {
            Route::get('/', [App\Http\Controllers\InformationsController::class, 'index'])->name('setting.information.index');
            Route::post('/store', [App\Http\Controllers\InformationsController::class, 'store'])->name('setting.information.store');
            Route::put('/{orId}/update', [App\Http\Controllers\InformationsController::class, 'update'])->name('setting.information.update');
            Route::delete('/{orId}/destroy', [App\Http\Controllers\InformationsController::class, 'destroy'])->name('setting.information.destroy');

            Route::post('/prefix/store', [App\Http\Controllers\InformationsController::class, 'storePrefix'])->name('setting.information.storePrefix');
            Route::put('/prefix/{prefixId}/update', [App\Http\Controllers\InformationsController::class, 'updatePrefix'])->name('setting.information.updatePrefix');
            Route::delete('/prefix/{prefixId}/destroy', [App\Http\Controllers\InformationsController::class, 'destroyPrefix'])->name('setting.information.destroyPrefix');
        });

        Route::prefix('user')->group(function () {
            Route::get('/', [App\Http\Controllers\UsersController::class, 'index'])->name('setting.user.index');
            Route::post('/store', [App\Http\Controllers\UsersController::class, 'store'])->name('setting.user.store');
            Route::put('/{userId}/update', [App\Http\Controllers\UsersController::class, 'update'])->name('setting.user.update');
            Route::delete('/{userId}/destroy', [App\Http\Controllers\UsersController::class, 'destroy'])->name('setting.user.destroy');
        });

    });
});

<?php

use App\Http\Controllers\WEB\Admin\NewsController;
use App\Http\Controllers\WEB\Admin\SectionController;
use App\Http\Controllers\WEB\NewsController as WEBNewsController;
use App\Http\Controllers\WEB\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WEBNewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [WEBNewsController::class, 'show'])->name('news.show');
Route::post('/news/search', [WEBNewsController::class, 'search'])->name('news.search');

Route::view('/login', 'user.login');
Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/users/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::patch('/users', [UserController::class, 'update'])->name('user.update')->middleware('auth');

Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::prefix('/news')->group(function () {
        Route::get('/create', [\App\Http\Controllers\WEB\Admin\NewsController::class, 'create'])->name('admin.news.create');
        Route::post('/', [\App\Http\Controllers\WEB\Admin\NewsController::class, 'store'])->name('admin.news.store');

        Route::get('/', [\App\Http\Controllers\WEB\Admin\NewsController::class, 'index'])->name('admin.news.index');
        Route::get('/{news}', [\App\Http\Controllers\WEB\Admin\NewsController::class, 'show'])->name('admin.news.show');

        Route::get('/{news}/edit', [\App\Http\Controllers\WEB\Admin\NewsController::class, 'edit'])->name('admin.news.edit');
        Route::patch('/{news}', [\App\Http\Controllers\WEB\Admin\NewsController::class, 'update'])->name('admin.news.update');

        Route::delete('/{news}', [\App\Http\Controllers\WEB\Admin\NewsController::class, 'destroy'])->name('admin.news.delete');
    });

    Route::prefix('sections')->group(function () {
        Route::get('/show', [SectionController::class, 'show'])->name('admin.section.show');
        Route::get('/edit', [SectionController::class, 'edit'])->name('admin.section.edit');
        Route::patch('/', [SectionController::class, 'update'])->name('admin.section.update');
    });

    Route::view('/', 'admin.index')->name('admin.index');
});

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ImageController;

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

# CRUD Albums
Route::get('/', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/album/create', [AlbumController::class, 'create'])->name('albums.create');
Route::get('/album/{album}/show', [AlbumController::class, 'show'])->name('albums.show');
Route::post('/album/store', [AlbumController::class, 'store'])->name('albums.store');
Route::get('/album/{album}/edit', [AlbumController::class, 'edit'])->name('albums.edit');
Route::put('/album/{album}/update', [AlbumController::class, 'update'])->name('albums.update');
Route::get('/album/{album}/destroy', [AlbumController::class, 'destroy'])->name('albums.destroy');

# CRUD Images
Route::get('/album/{album}/image/create', [ImageController::class, 'create'])->name('images.create');
Route::post('/album/{album}/image/store', [ImageController::class, 'store'])->name('images.store');
Route::get('image/{image}/edit', [ImageController::class, 'edit'])->name('images.edit');
Route::put('image/{image}/update', [ImageController::class, 'update'])->name('images.update');
Route::get('image/{image}/destroy', [ImageController::class, 'destroy'])->name('images.destroy');
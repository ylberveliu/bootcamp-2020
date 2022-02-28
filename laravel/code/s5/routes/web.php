<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\SessionController;

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

Route::get('/upload', [FormController::class, 'index'])->name('upload-image-form');
Route::post('/upload', [FormController::class, 'upload'])->name('upload-image-action');


Route::get('/session/set/{key}/{value}', [SessionController::class, 'set'])->name('session.set');
Route::get('/session/get/{key}', [SessionController::class, 'get'])->name('session.get');
Route::get('/session/delete/{key}', [SessionController::class, 'delete'])->name('session.delete');


Route::get('/cookie/set/{key}/{value}/{expire}', [CookieController::class, 'set'])->name('cookie.set');
Route::get('/cookie/get/{key}', [CookieController::class, 'get'])->name('cookie.get')->middleware('auth');
Route::get('/cookie/delete/{key}', [CookieController::class, 'delete'])->name('cookie.delete');

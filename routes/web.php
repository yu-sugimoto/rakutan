<?php

use App\Http\Controllers\ReviewController;
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

Route::get('/', [ReviewController::class, 'index'])->name('index');
Route::get('/seach', [ReviewController::class, 'search'])->name('search');
Route::get('/form', [ReviewController::class, 'form'])->name('review.form');
Route::post('/form/check', [ReviewController::class, 'check'])->name('review.check');
Route::post('/form/thanks', [ReviewController::class, 'thanks'])->name('review.thanks');
Route::get('/terms', [ReviewController::class, 'terms'])->name('terms');
Route::get('/privacy', [ReviewController::class, 'privacy'])->name('privacy');

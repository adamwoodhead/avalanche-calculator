<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebtsController;
use App\Http\Controllers\HowToController;
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

Route::get('/', [DashboardController::class, 'show'])->name('dashboard.show');

Route::prefix('debts')->name('debts.')->group(function () {
    Route::get('/', [DebtsController::class, 'show'])->name('show');
});

Route::prefix('calculate')->name('calculate.')->group(function () {
    Route::get('avalanche', [CalculatorController::class, 'avalanche'])->name('avalanche.show');
    Route::get('snowball', [CalculatorController::class, 'snowball'])->name('snowball.show');
});

Route::prefix('how-to')->name('how-to.')->group(function () {
    Route::get('avalanche', [HowToController::class, 'avalanche'])->name('avalanche.show');
    Route::get('snowball', [HowToController::class, 'snowball'])->name('snowball.show');
});

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::get('/about', [AboutController::class, 'show'])->name('about.show');


<?php

use App\Http\Controllers\AnalisController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\Komite1Controller;
use App\Http\Controllers\Komite2Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('index', [
        'title' => 'Home',
        'judul' => 'PT Bank Perkreditan Rakyat'
    ]);
})->middleware(['auth']);

// LOGIN
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});

// ADMIN
Route::resource('/register', RegisterController::class)->only(['index', 'store', 'destroy'])->middleware(['auth', 'admin']);
// ARSIP
Route::resource('/arsip', ArsipController::class)->only(['index', 'show'])->middleware(['auth', 'admin']);

// MARKETING
Route::resource('/marketing', MarketingController::class)->except(['edit'])->middleware(['auth', 'marketing']);

// ANALIS
Route::resource('/analis', AnalisController::class)->only(['index', 'show', 'update'])->middleware(['auth', 'analis']);

// KOMITE
// MANAJER
Route::resource('/manajer', Komite1Controller::class)->only(['index', 'show', 'update'])->middleware(['auth', 'komite1']);
// DIRUT
Route::resource('/dirut', Komite2Controller::class)->only(['index', 'show', 'update'])->middleware(['auth', 'komite2']);

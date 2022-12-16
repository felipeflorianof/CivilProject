<?php

use App\Http\Controllers\CivilController;
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

Route::get('/', [CivilController::class, 'index'])->name('CivilProject-index');

Route::get('/create', [CivilController::class, 'create'])->name('CivilProject-create');

Route::post('/', [CivilController::class, 'store'])->name('CivilProject-store');

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
Route::get('/edit/{id}', [CivilController::class, 'edit'])->where('id', '[0-9]+')->name('CivilProject-edit');
Route::put('/{id}', [CivilController::class, 'update'])->where('id', '[0-9]+')->name('CivilProject-update');
Route::delete('/{id}', [CivilController::class, 'destroy'])->where('id', '[0-9]+')->name('CivilProject-destroy');
Route::get('/send/{id}', [CivilController::class, 'send'])->where('id', '[0-9]+')->name('CivilProject-send');
Route::post('/sendstore', [CivilController::class, 'sendstore'])->where('id', '[0-9]+')->name('CivilProject-sendstore');
Route::get('/applicants', [CivilController::class, 'applicants'])->name('CivilProject-applicants');
Route::get('/info/{id}', [CivilController::class, 'info'])->where('id', '[0-9]+')->name('CivilProject-info');
Route::get('/select', [CivilController::class, 'select'])->name('CivilProject-select');
Route::get('/extra', [CivilController::class, 'extra'])->name('CivilProject-extra');

Route::fallback([CivilController::class, 'notfound'])->name('CivilProject-notfound');





<?php

use App\Http\Controllers\CivilController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CivilController::class, 'index'])->name('CivilProject-index');
Route::get('/create', [CivilController::class, 'create'])->name('CivilProject-create');
Route::post('/', [CivilController::class, 'store'])->name('CivilProject-store');
Route::get('/edit/{id}', [CivilController::class, 'edit'])->where('id', '[0-9]+')->name('CivilProject-edit');
Route::put('/{id}', [CivilController::class, 'update'])->where('id', '[0-9]+')->name('CivilProject-update');
Route::put('/return/{id}', [CivilController::class, 'updateRequest'])->where('id', '[0-9]+')->name('CivilProject-updateRequest');
Route::get('/send/{id}', [CivilController::class, 'send'])->where('id', '[0-9]+')->name('CivilProject-send');
Route::post('/sendstore', [CivilController::class, 'sendstore'])->where('id', '[0-9]+')->name('CivilProject-sendstore');
Route::get('/applicants', [CivilController::class, 'applicants'])->name('CivilProject-applicants');
Route::get('/info/{id}', [CivilController::class, 'info'])->where('id', '[0-9]+')->name('CivilProject-info');
Route::get('/select', [CivilController::class, 'select'])->name('CivilProject-select');
Route::get('/extra', [CivilController::class, 'extra'])->name('CivilProject-extra');
Route::get('/extradata', [CivilController::class, 'extradata'])->name('CivilProject-extradata');
Route::post('/extrastore', [CivilController::class, 'extrastore'])->name('CivilProject-extrastore');
Route::get('/query', [CivilController::class, 'query'])->name('CivilProject-query');
Route::get('/return/{id}', [CivilController::class, 'return'])->where('id', '[0-9]+')->name('CivilProject-return');
Route::delete('/{id}', [CivilController::class, 'SoftDeleteAndForceDelete'])->where('id', '[0-9]+')->name('CivilProject-SoftDeleteAndForceDelete');
Route::delete('/query/{id}', [CivilController::class, 'SoftDeleteAndForceDelete'])->where('id', '[0-9]+')->name('CivilProject-SoftDeleteAndForceDelete');
Route::fallback([CivilController::class, 'notfound'])->name('CivilProject-notfound');
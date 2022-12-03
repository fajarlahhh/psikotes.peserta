<?php

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

Route::middleware(['auth'])->group(function () {
  Route::get('/', \App\Http\Livewire\Home::class);
  Route::prefix('/materisatu')->group(function () {
    Route::get('/{key}', \App\Http\Livewire\Materisatu\Intro::class);
    Route::get('/{key}/soal', \App\Http\Livewire\Materisatu\Soal::class);
    Route::get('/{key}/hasil', \App\Http\Livewire\Materisatu\Hasil::class);
  });
  Route::prefix('/materidua')->group(function () {
    Route::get('/{key}', \App\Http\Livewire\Materidua\Intro::class);
    Route::get('/{key}/soal', \App\Http\Livewire\Materidua\Soal::class);
    Route::get('/{key}/hasil', \App\Http\Livewire\Materidua\Hasil::class);
  });
  Route::prefix('/materitiga')->group(function () {
    Route::get('/{key}', \App\Http\Livewire\Materitiga\Intro::class);
    Route::get('/{key}/jeda/{kolom}', \App\Http\Livewire\Materitiga\Jeda::class);
    Route::get('/{key}/kolom/{kolom}', \App\Http\Livewire\Materitiga\Soal::class);
    Route::get('/{key}/hasil', \App\Http\Livewire\Materitiga\Hasil::class);
  });
});

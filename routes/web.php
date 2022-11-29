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
    Route::get('/{key}/1', \App\Http\Livewire\Materitiga\Kolom1::class);
    Route::get('/{key}/2', \App\Http\Livewire\Materitiga\Kolom2::class);
    Route::get('/{key}/3', \App\Http\Livewire\Materitiga\Kolom3::class);
    Route::get('/{key}/4', \App\Http\Livewire\Materitiga\Kolom4::class);
    Route::get('/{key}/5', \App\Http\Livewire\Materitiga\Kolom5::class);
    Route::get('/{key}/6', \App\Http\Livewire\Materitiga\Kolom6::class);
    Route::get('/{key}/7', \App\Http\Livewire\Materitiga\Kolom7::class);
    Route::get('/{key}/8', \App\Http\Livewire\Materitiga\Kolom8::class);
    Route::get('/{key}/9', \App\Http\Livewire\Materitiga\Kolom9::class);
    Route::get('/{key}/10', \App\Http\Livewire\Materitiga\Kolom10::class);
    Route::get('/{key}/hasil', \App\Http\Livewire\Materitiga\Hasil::class);
  });
});

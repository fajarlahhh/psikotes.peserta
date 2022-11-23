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
  Route::get('/materisatu/{key}', \App\Http\Livewire\Materisatu\Intro::class);
  Route::get('/materisatu/{key}/soal', \App\Http\Livewire\Materisatu\Soal::class);
  Route::get('/materisatu/{key}/hasil', \App\Http\Livewire\Materisatu\Hasil::class);
});

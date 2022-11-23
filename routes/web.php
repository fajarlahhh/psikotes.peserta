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

Route::middleware(['auth', 'can:isAdmin'])->group(function () {
  Route::get('/', \App\Http\Livewire\Backend\Home::class);
  Route::get('/gantikatasandi', \App\Http\Livewire\Backend\Gantikatasandi::class);
  Route::get('/soal', \App\Http\Livewire\Backend\Soal\Index::class);
  Route::get('/petunjuk', \App\Http\Livewire\Backend\Petunjuk::class);
  Route::prefix('ruangkerja')->group(function () {
    Route::get('/', \App\Http\Livewire\Backend\Ruangkerja\Index::class);
    Route::get('/tambah', \App\Http\Livewire\Backend\Ruangkerja\Form::class);
  });
});

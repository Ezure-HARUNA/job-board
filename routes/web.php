<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationController;

Route::get('/', fn() => to_route('jobs.index'));

Route::resource('jobs', JobController::class);


Route::get('login', fn() => to_route('auth.create'))->name('login');
Route::resource('auth', AuthController::class)
  ->only(['create', 'store']);
Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
  ->name('auth.destroy');

Route::middleware('auth')->group(function () {
  Route::resource('job.application', JobApplicationController::class)
    ->only(['create', 'store']);
});

<?php

use Illuminate\Support\Facades\Route;
// routes/web.php
use App\Http\Controllers\JobController;

Route::get('/', function () {
  return redirect()->route('jobs.index');
});

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');

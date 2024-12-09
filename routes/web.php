<?php

use Illuminate\Support\Facades\Route;
// routes/web.php
use App\Http\Controllers\JobController;

Route::get('/', fn() => to_route('jobs.index'));

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');

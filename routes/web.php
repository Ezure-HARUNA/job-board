<?php

use Illuminate\Support\Facades\Route;
// routes/web.php
use App\Http\Controllers\JobController;

Route::get('/jobs', [JobController::class, 'index']);

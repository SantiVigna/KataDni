<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DniLetterController;

Route::post('/dni/calculate', [DniLetterController::class, 'calculate'])->name('apiCalculator');

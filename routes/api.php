<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::post('/event', [AccountController::class, 'createAccount']);

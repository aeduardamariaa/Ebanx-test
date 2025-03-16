<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

// Route::post('/event', [AccountController::class, 'createAccount']);


Route::post('/event', [TransactionController::class, 'withdraw']);
Route::get('/balance', [TransactionController::class, 'getBalance']);

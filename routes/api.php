<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

// Route::post('/event', [AccountController::class, 'createAccount']);


Route::post('/event', [TransactionController::class, 'transfer']);
Route::get('/balance', [TransactionController::class, 'getBalance']);
Route::post('/reset', []);

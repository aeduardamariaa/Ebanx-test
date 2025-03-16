<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::post('/event', [TransactionController::class, 'handleTransaction']);
Route::get('/balance', [TransactionController::class, 'getBalance']);
Route::post('/reset', []);

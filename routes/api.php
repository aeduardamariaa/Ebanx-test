<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::post('/event', [TransactionController::class, 'handleTransaction']);
Route::get('/balance', [BalanceController::class, 'getBalance']);
Route::post('/reset', [ResetController::class, 'reset']);
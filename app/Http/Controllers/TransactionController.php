<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Services\Contracts\TransactionServiceInterface;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionServiceInterface $transactionService) {
        $this->transactionService = $transactionService;
    }

    public function handleTransaction(TransactionRequest $request): Response
    {
        return $this->transactionService->handleTransaction($request->validated());
    }
}
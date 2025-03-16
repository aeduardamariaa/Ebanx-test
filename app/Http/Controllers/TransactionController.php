<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Services\Contracts\TransactionServiceInterface;
use Illuminate\Http\JsonResponse;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionServiceInterface $transactionService) {
        $this->transactionService = $transactionService;
    }

    public function handleTransaction(TransactionRequest $request): JsonResponse
    {
        return $this->transactionService->handleTransaction($request->validated());
    }

    public function getBalance(): JsonResponse
    {
        $accountId = request()->query('account_id');

        return $this->transactionService->getBalance($accountId);
    }
}
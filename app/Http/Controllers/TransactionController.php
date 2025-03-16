<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositRequest;
use App\Http\Requests\TransferRequest;
use App\Http\Requests\WithdrawRequest;
use App\Services\Contracts\TransactionServiceInterface;
use Illuminate\Http\JsonResponse;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionServiceInterface $transactionService) {
        $this->transactionService = $transactionService;
    }

    public function deposit(DepositRequest $request): JsonResponse
    {
        return $this->transactionService->deposit($request->validated());
    }

    public function withdraw(WithdrawRequest $request): JsonResponse
    {
        return $this->transactionService->withdraw($request->validated());
    }

    public function transfer(TransferRequest $request): JsonResponse
    {
        return $this->transactionService->transfer($request->validated());
    }

    public function getBalance(): JsonResponse
    {
        $accountId = request()->query('account_id');

        return $this->transactionService->getBalance($accountId);
    }

}
<?php

namespace App\Services\Contracts;

use App\Http\Requests\DepositRequest;
use App\Http\Requests\WithdrawRequest;
use App\Http\Requests\TransferRequest;
use Illuminate\Http\JsonResponse;

interface TransactionServiceInterface
{
    public function deposit(array $data): JsonResponse;
    public function withdraw(array $data): JsonResponse;
    public function transfer(array $data): JsonResponse;
    public function getBalance($accountId = null): JsonResponse;
}
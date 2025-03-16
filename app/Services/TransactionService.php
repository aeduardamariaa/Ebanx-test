<?php

namespace App\Services;

use App\Http\Requests\DepositRequest;
use App\Http\Requests\TransferRequest;
use App\Http\Requests\WithdrawRequest;
use App\Http\Resources\DepositResource;
use App\Http\Resources\TransferResource;
use App\Http\Resources\WithdrawResource;
use App\Services\Contracts\TransactionServiceInterface;
use Illuminate\Http\JsonResponse;

class TransactionService implements TransactionServiceInterface
{
    public function deposit(DepositRequest $data): JsonResponse
    {
        try {
            return response()->json(201);
        } catch (\Exception $e) {
            return response()->json(201);
        }
    }

    public function withdraw(WithdrawRequest $data): JsonResponse
    {
        try {
            return response()->json(201);
        } catch (\Exception $e) {
            return response()->json(201);
        }
    }

    public function transfer(TransferRequest $data): JsonResponse
    {
        try {
            return response()->json(201);
        } catch (\Exception $e) {
            return response()->json(201);
        }
    }

    public function getBalance($accountId = null): JsonResponse
    {
        try {
            return response()->json(201);
        } catch (\Exception $e) {
            return response()->json(201);
        }
    }
}
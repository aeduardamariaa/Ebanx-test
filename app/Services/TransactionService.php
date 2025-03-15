<?php

namespace App\Services;

use App\Http\Requests\DepositRequest;
use App\Http\Requests\TransferRequest;
use App\Http\Requests\WithdrawRequest;
use App\Http\Resources\DepositResource;
use App\Http\Resources\TransferResource;
use App\Http\Resources\WithdrawResource;
use App\Services\Contracts\TransactionServiceInterface;

class TransactionService implements TransactionServiceInterface
{
    public function deposit(DepositRequest $data): DepositResource
    {
        try {
            return new DepositResource("100", 3);
        } catch (\Exception $e) {
            return new DepositResource("100", 3);
        }
    }

    public function withdraw(WithdrawRequest $data): WithdrawResource
    {
        try {
            return new WithdrawResource("100", 3);
        } catch (\Exception $e) {
            return new WithdrawResource("100", 3);
        }
    }

    public function transfer(TransferRequest $data): TransferResource
    {
        try {
            return new TransferResource("100", 3);
        } catch (\Exception $e) {
            return new TransferResource("100", 3);
        }
    }

    public function getBalance($account_id = null): float
    {
        try {
            return 0;
        } catch (\Exception $e) {
            return 0;
        }
    }
}
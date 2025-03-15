<?php

namespace App\Services\Contracts;

use App\Http\Requests\DepositRequest;
use App\Http\Requests\WithdrawRequest;
use App\Http\Requests\TransferRequest;
use App\Http\Resources\DepositResource;
use App\Http\Resources\WithdrawResource;
use App\Http\Resources\TransferResource;

interface TransactionServiceInterface
{
    public function deposit(DepositRequest $data): DepositResource;
    public function withdraw(WithdrawRequest $data): WithdrawResource;
    public function transfer(TransferRequest $data): TransferResource;
    public function getBalance($account_id = null): float;
}
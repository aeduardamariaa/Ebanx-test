<?php

namespace App\Services\Contracts;

use Illuminate\Http\JsonResponse;

interface TransactionServiceInterface
{
    public function deposit(array $data): JsonResponse;
    public function withdraw(array $data): JsonResponse;
    public function transfer(array $data): JsonResponse;
    public function getBalance($accountId = null): JsonResponse;
    public function handleTransaction(array $data): JsonResponse; 
}
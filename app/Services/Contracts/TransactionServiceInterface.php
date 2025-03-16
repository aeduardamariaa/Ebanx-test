<?php

namespace App\Services\Contracts;

use Illuminate\Http\JsonResponse;

interface TransactionServiceInterface
{
    public function handleTransaction(array $data): JsonResponse; 
}
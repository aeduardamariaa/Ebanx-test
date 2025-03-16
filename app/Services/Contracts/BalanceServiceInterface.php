<?php

namespace App\Services\Contracts;

use Illuminate\Http\JsonResponse;

interface BalanceServiceInterface
{
    public function getBalance($accountId = null): JsonResponse;
}
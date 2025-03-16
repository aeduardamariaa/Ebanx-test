<?php

namespace App\Services\Contracts;

use Illuminate\Http\JsonResponse;

interface AccountServiceInterface
{
    public function createAccount(array $data): JsonResponse;
}
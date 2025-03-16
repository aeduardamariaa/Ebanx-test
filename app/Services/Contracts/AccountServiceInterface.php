<?php

namespace App\Services\Contracts;

use App\Http\Requests\CreateAccountRequest;
use Illuminate\Http\JsonResponse;

interface AccountServiceInterface
{
    public function createAccount(CreateAccountRequest $data): JsonResponse;
}
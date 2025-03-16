<?php

namespace App\Services\Contracts;

use App\Http\Requests\CreateAccountRequest;
use App\Http\Resources\CreateAccountResource;
use Illuminate\Http\JsonResponse;

interface AccountServiceInterface
{
    public function createAccount(CreateAccountRequest $data): JsonResponse;
}
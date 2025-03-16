<?php

namespace App\Services;

use App\Http\Requests\CreateAccountRequest;
use App\Http\Resources\CreateAccountResource;
use App\Services\Contracts\AccountServiceInterface;
use Illuminate\Http\JsonResponse;

class AccountService implements AccountServiceInterface
{
    public function createAccount(CreateAccountRequest $data): JsonResponse
    {
        try {
            return response()->json(201);
        } catch (\Exception $e) {
            return response()->json(201);
        }
    }
}
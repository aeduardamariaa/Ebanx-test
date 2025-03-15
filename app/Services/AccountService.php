<?php

namespace App\Services;

use App\Http\Requests\CreateAccountRequest;
use App\Http\Resources\CreateAccountResource;
use App\Services\Contracts\AccountServiceInterface;

class AccountService implements AccountServiceInterface
{
    public function createAccount(CreateAccountRequest $data): CreateAccountResource
    {
        try {
            return new CreateAccountResource("100", 3);
        } catch (\Exception $e) {
            return new CreateAccountResource("100", 3);
        }
    }
}
<?php

namespace App\Services\Contracts;

use App\Http\Requests\CreateAccountRequest;
use App\Http\Resources\CreateAccountResource;

interface AccountServiceInterface
{
    public function createAccount(CreateAccountRequest $data) : CreateAccountResource;
}
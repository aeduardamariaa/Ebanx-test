<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccountRequest;
use App\Services\Contracts\AccountServiceInterface;
use Illuminate\Http\JsonResponse;

class AccountController extends Controller
{
    protected $accountService;

    public function __construct(AccountServiceInterface $accountService) {
        $this->accountService = $accountService;
    }

    public function createAccount(CreateAccountRequest $request): JsonResponse
    {
        return $this->accountService->createAccount($request->validated());
    }
}

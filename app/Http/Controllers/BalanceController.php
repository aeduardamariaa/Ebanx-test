<?php

namespace App\Http\Controllers;

use App\Services\Contracts\BalanceServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    protected $balanceService;

    public function __construct(BalanceServiceInterface $balanceService) {
        $this->balanceService = $balanceService;
    }

    public function getBalance(Request $request): JsonResponse
    {
        return $this->balanceService->getBalance($request->all());
    }
}
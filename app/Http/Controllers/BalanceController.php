<?php

namespace App\Http\Controllers;

use App\Services\Contracts\BalanceServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BalanceController extends Controller
{
    protected $balanceService;

    public function __construct(BalanceServiceInterface $balanceService) {
        $this->balanceService = $balanceService;
    }

    public function getBalance(Request $request): Response
    {
        return $this->balanceService->getBalance($request->all());
    }
}
<?php

namespace App\Services;

use App\Models\Account;
use App\Services\Contracts\BalanceServiceInterface;
use Illuminate\Http\JsonResponse;

class BalanceService implements BalanceServiceInterface
{
    public function getBalance($accountId = null): JsonResponse
    {
        $account = Account::find($accountId)->first();

        if (!$account) {
            return response()->json(
                0, 
                404
            );
        }

        return response()->json(
            $account->balance, 
            200
        ); 
    }
}
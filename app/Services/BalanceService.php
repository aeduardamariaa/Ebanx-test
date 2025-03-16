<?php

namespace App\Services;

use App\Models\Account;
use App\Services\Contracts\BalanceServiceInterface;
use Illuminate\Http\Response;

class BalanceService implements BalanceServiceInterface
{
    public function getBalance($accountId = null): Response
    {
        $account = Account::find($accountId)->first();

        if (!$account) {
            return response()->make(0, 404);
        }

        return response()->make($account->balance, 200);
    }
}
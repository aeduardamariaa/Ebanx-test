<?php

namespace App\Services;

use App\Http\Resources\CreateAccountResource;
use App\Models\Account;
use App\Models\Transaction;
use App\Services\Contracts\AccountServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class AccountService implements AccountServiceInterface
{
    public function createAccount(array $data): JsonResponse
    {
        DB::beginTransaction();
        
        try {
            $account = Account::create([
                'id' => $data['destination'],
                'balance' => $data['amount']
            ]);

            Transaction::create([
                'type' => 'deposit', 
                'amount' => $data['amount'], 
                'destination' => $data['destination']
            ]);

            DB::commit();

            return response()->json(
                new CreateAccountResource($account), 
                201
            );

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json(
                ['Account already exists'],
                400
            );
        }
    }
}
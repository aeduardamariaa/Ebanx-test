<?php

namespace App\Services;

use App\Http\Resources\DepositResource;
use App\Http\Resources\WithdrawResource;
use App\Models\Account;
use App\Models\Transaction;
use App\Services\Contracts\TransactionServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class TransactionService implements TransactionServiceInterface
{
    public function deposit(array $data): JsonResponse
    {
        $destinationAccount = Account::find($data['destination']);

        DB::beginTransaction();
        
        try {
            Transaction::create([
                'type' => $data['type'],
                'amount' => $data['amount'], 
                'destination' => $data['destination']
            ]);

            $destinationAccount->balance += $data['amount'];
            $destinationAccount->save();

            DB::commit();

            return response()->json(
                new DepositResource($destinationAccount), 
                201
            ); 

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json(
                $e->getMessage(),
                400
            );
        }
    }

    public function withdraw(array $data): JsonResponse
    {
        $originAccount = Account::find($data['origin']);
 
        if (!$originAccount) {
            return response()->json(
                0, 
                404
            );
        }
    
        if ($originAccount->balance < $data['amount']) {
            return response()->json(
                'Insufficient balance', 
                400
            );
        }
    
        DB::beginTransaction();
        
        try {
            Transaction::create([
                'type' => 'withdraw',
                'amount' => $data['amount'], 
                'origin' => $data['origin']
            ]);
    
            $originAccount->balance -= $data['amount'];
            $originAccount->save();
    
            DB::commit();
    
            return response()->json(
                new WithdrawResource($originAccount), 
                201
            );
    
        } catch (\Exception $e) {

            DB::rollBack();
            
            return response()->json(
                $e->getMessage(),
                400
            );
        }
    }
    

    public function transfer(array $data): JsonResponse
    {
        try {
            return response()->json(201);
        } catch (\Exception $e) {
            return response()->json(201);
        }
    }

    public function getBalance($accountId = null): JsonResponse
    {
        $account = Account::find($accountId);

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
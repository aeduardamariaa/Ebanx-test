<?php

namespace App\Services;

use App\Http\Resources\DepositResource;
use App\Http\Resources\TransferResource;
use App\Http\Resources\WithdrawResource;
use App\Models\Account;
use App\Models\Transaction;
use App\Services\Contracts\TransactionServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TransactionService implements TransactionServiceInterface
{
    public function handleTransaction(array $data): Response 
    {
        if (!isset($data['type'])) {
            return response()->make('Transaction type is required', 400);
        }
    
        switch ($data['type']) {
            case 'deposit':
                return $this->deposit($data);
    
            case 'withdraw':
                return $this->withdraw($data);
    
            case 'transfer':
                return $this->transfer($data);
    
            default:
                return response()->make('Invalid transaction type', 400);
        }
    }

    private function deposit(array $data): Response
    {
        $destinationAccount = Account::find($data['destination']);

        DB::beginTransaction();
        
        try {
            if (!$destinationAccount) {
                $destinationAccount = Account::create([
                    'id' => $data['destination'],
                    'balance' => $data['amount']
                ]);
            } else {
                $destinationAccount->balance += $data['amount'];
                $destinationAccount->save();
            }

            Transaction::create([
                'type' => $data['type'],
                'amount' => $data['amount'], 
                'destination' => $data['destination']
            ]);

            DB::commit();

            return response()->make(new DepositResource($destinationAccount), 201);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->make($e->getMessage(), 400);
        }
    }

    private function withdraw(array $data): Response
    {
        $originAccount = Account::find($data['origin']);
 
        if (!$originAccount) {
            return response()->make(0, 404);
        }
    
        if ($originAccount->balance < $data['amount']) {
            return response()->make('Insufficient balance', 400);
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
    
            return response()->make(new WithdrawResource($originAccount), 201);
    
        } catch (\Exception $e) {

            DB::rollBack();
            
            return response()->make($e->getMessage(), 400);
        }
    }
    

    private function transfer(array $data): Response
    {
        $originAccount = Account::find($data['origin']);
 
        if (!$originAccount) {
            return response()->make(0, 404);
        }

        if ($originAccount->balance < $data['amount']) {
            return response()->make('Insufficient balance', 404);
        }

        $destinationAccount = Account::find($data['destination']);

        DB::beginTransaction();
        
        try {
            if (!$destinationAccount) {
                $destinationAccount = Account::create([
                    'id' => $data['destination'],
                    'balance' => $data['amount']
                ]);
            } else {
                $destinationAccount->balance += $data['amount'];
                $destinationAccount->save();
            }
    
            Transaction::create([
                'type' => 'withdraw',
                'amount' => $data['amount'], 
                'origin' => $data['origin'],
                'destination' => $data['destination']
            ]);
    
            $originAccount->balance -= $data['amount'];
            $originAccount->save();
    
            DB::commit();
    
            return response()->make(new TransferResource((object) [
                                        'origin' => $originAccount,
                                        'destination' => $destinationAccount
                                    ]), 201);
    
        } catch (\Exception $e) {

            DB::rollBack();
            
            return response()->make($e->getMessage(), 400);
        }
    }
}
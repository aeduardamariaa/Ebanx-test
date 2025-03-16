<?php

namespace App\Services;

use App\Models\Account;
use App\Models\Transaction;
use App\Services\Contracts\ResetServiceInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ResetService implements ResetServiceInterface
{
    public function reset(): Response
    {
        try {
            DB::beginTransaction();
            
            Transaction::truncate();
            Account::truncate();
            
            DB::commit();

            return response()->make('OK', 200);
            
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->make($e->getMessage(), 400);
        }
    }
}
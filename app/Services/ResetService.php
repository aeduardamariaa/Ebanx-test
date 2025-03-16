<?php

namespace App\Services;

use App\Models\Account;
use App\Models\Transaction;
use App\Services\Contracts\ResetServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ResetService implements ResetServiceInterface
{
    public function reset(): JsonResponse
    {
        try {
            DB::beginTransaction();
            
            Transaction::truncate();
            Account::truncate();
            
            DB::commit();

            return response()->json(
                'OK', 
                200
            );
            
        } catch (\Exception $e) {
            return response()->json(
                $e->getMessage(),
                400
            );
        }
    }
}
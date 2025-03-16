<?php

namespace App\Services;

use App\Services\Contracts\ResetServiceInterface;
use Illuminate\Http\JsonResponse;

class ResetService implements ResetServiceInterface
{
    public function reset(): JsonResponse
    {
        try {
            return response()->json(201);
        } catch (\Exception $e) {
            return response()->json(201);
        }
    }
}
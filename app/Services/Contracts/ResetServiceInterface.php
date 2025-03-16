<?php

namespace App\Services\Contracts;

use Illuminate\Http\JsonResponse;

interface ResetServiceInterface
{
    public function reset(): JsonResponse;
}
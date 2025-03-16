<?php

namespace App\Services\Contracts;

use Illuminate\Http\Response;

interface ResetServiceInterface
{
    public function reset(): Response;
}
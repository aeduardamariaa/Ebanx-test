<?php

namespace App\Services\Contracts;

use Illuminate\Http\Response;

interface BalanceServiceInterface
{
    public function getBalance($accountId = null): Response;
}
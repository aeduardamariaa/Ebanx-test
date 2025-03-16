<?php

namespace App\Services\Contracts;

use Illuminate\Http\Response;

interface TransactionServiceInterface
{
    public function handleTransaction(array $data): Response; 
}
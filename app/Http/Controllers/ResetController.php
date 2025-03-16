<?php

namespace App\Http\Controllers;

use App\Services\Contracts\ResetServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ResetController extends Controller
{
    protected $resetService;

    public function __construct(ResetServiceInterface $resetService) {
        $this->resetService = $resetService;
    }

    public function reset(Request $request): JsonResponse
    {
        return $this->resetService->reset($request->validated());
    }
}

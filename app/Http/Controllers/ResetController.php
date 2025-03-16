<?php

namespace App\Http\Controllers;

use App\Services\Contracts\ResetServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResetController extends Controller
{
    protected $resetService;

    public function __construct(ResetServiceInterface $resetService) {
        $this->resetService = $resetService;
    }

    public function reset(Request $request): Response
    {
        return $this->resetService->reset($request->all());
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'origin' => [
                'id' => (string) $this->origin_id,
                'balance' => (float) $this->origin_balance,
            ],
            'destination' => [
                'id' => (string) $this->destination_id,
                'balance' => (float) $this->destination_balance,
            ],
        ];
    }
}

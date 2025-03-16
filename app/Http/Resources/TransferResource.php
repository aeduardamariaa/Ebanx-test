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
                'id' => (string) $this->resource->origin->id,
                'balance' => (float) $this->resource->origin->balance,
            ],
            'destination' => [
                'id' => (string) $this->resource->destination->id,
                'balance' => (float) $this->resource->destination->balance,
            ],
        ];
    }
}

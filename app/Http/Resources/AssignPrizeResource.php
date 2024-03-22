<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AssignPrizeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'rank_category_id' => $this->rank_category_id,
            'odds_of_winning' => $this->odds_of_winning,
            'amount' => $this->amount,
            'id' => $this->id
        ];
    }
}

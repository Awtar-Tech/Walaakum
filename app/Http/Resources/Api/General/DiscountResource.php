<?php

namespace App\Http\Resources\Api\General;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['provider_id'] = $this->getProviderId();
        $Objects['amount'] = $this->getAmount();
        $Objects['description'] = $this->getDescription();
        return $Objects;
    }
}

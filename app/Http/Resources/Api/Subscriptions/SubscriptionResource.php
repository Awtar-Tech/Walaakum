<?php

namespace App\Http\Resources\Api\Subscriptions;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['name'] = $this->getName();
        $Objects['name_ar'] = $this->getNameAr();
        $Objects['image'] = $this->getImage();
        $Objects['months'] = $this->getMonths();
        $Objects['price'] = $this->getPrice();
        $Objects['description'] = $this->getDescription();
        $Objects['description_ar'] = $this->getDescriptionAr();
        return $Objects;
    }
}

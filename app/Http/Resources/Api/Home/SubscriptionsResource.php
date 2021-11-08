<?php

namespace App\Http\Resources\Api\Home;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionsResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['name'] = (app()->getLocale() == 'ar')?$this->getNameAr():$this->getName();
        $Objects['description'] = (app()->getLocale() == 'ar')?$this->getDescriptionAr():$this->getDescription();
        $Objects['months'] = $this->months;
        $Objects['price'] = $this->price;
        $Objects['image'] = asset($this->getImage());
        return $Objects;
    }
}

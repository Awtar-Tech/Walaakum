<?php

namespace App\Http\Resources\Api\General;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['name'] = (app()->getLocale() == 'ar')?$this->getNameAr():$this->getName();
        $Objects['image'] = $this->getImage();
        $Objects['popup'] = $this->isPopup();
        return $Objects;
    }
}

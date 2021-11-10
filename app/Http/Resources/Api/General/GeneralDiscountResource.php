<?php

namespace App\Http\Resources\Api\General;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneralDiscountResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['name'] = (app()->getLocale() == 'ar')?$this->getNameAr():$this->getName();
        $Objects['image'] = $this->getImage();
        $Objects['type'] = $this->getType();
        $Objects['code'] = $this->getCode();
        $Objects['url'] = $this->getUrl();
        return $Objects;
    }
}

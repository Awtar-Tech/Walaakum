<?php

namespace App\Http\Resources\Api\Provider;

use App\Http\Resources\Api\Home\CountryResource;
use App\Http\Resources\Api\Home\CityResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProviderAddressResource extends JsonResource
{
    public function toArray($request): array
    {
        $Object['id'] = $this->getId();
        $Object['country_id'] = $this->getCountryId();
        $Object['Country'] = new CountryResource($this->country);
        $Object['city_id'] = $this->getCityId();
        $Object['City'] = new CityResource($this->city);
        $Object['address'] = $this->getAddress();
        return $Object;
    }

}

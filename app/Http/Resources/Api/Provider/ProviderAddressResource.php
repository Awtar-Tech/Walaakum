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
        $Object['Country'] = $this->country?new CountryResource($this->country):null;
        $Object['city_id'] = $this->getCityId();
        $Object['City'] = ($this->city) ? new CityResource($this->city):null;
        $Object['address'] = $this->getAddress();
        $Object['lat'] = $this->getLat();
        $Object['lng'] = $this->getLng();
        return $Object;
    }

}

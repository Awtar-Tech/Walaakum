<?php

namespace App\Http\Resources\Api\Provider;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderResource extends JsonResource
{
    public function toArray($request): array
    {
        $Object['id'] = $this->getId();
        $Object['store_name'] = $this->getStoreName();
        $Object['image'] = $this->getImage();
        $Object['about'] = $this->getAbout();
        $Object['ProviderAddresses'] = ProviderAddressResource::collection($this->provider_addresses);
        return $Object;
    }

}

<?php

namespace App\Http\Resources\Api\Provider;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderResource extends JsonResource
{
    public function toArray($request): array
    {
        $Object['id'] = $this->getId();
        $Object['store_name'] = $this->getStoreName();
        $Object['store_owner_name'] = $this->getStoreOwnerName();
        $Object['commercial_register_number'] = $this->getCommercialRegisterNumber();
        $Object['commercial_register_image'] = $this->getCommercialRegisterImage();
        $Object['ProviderAddresses'] = ProviderAddressResource::collection($this->provider_addresses);
        return $Object;
    }

}

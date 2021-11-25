<?php

namespace App\Http\Resources\Api\Provider;

use App\Http\Resources\Api\General\DiscountResource;
use App\Models\Favorite;
use http\Exception;
use Illuminate\Http\Resources\Json\JsonResource;

class ProviderResource extends JsonResource
{
    public function toArray($request): array
    {
        $Object['id'] = $this->getId();
        $Object['store_name'] = $this->getStoreName();
        $Object['image'] = ($this->getImage())? asset($this->getImage()): asset('storage/user.png');
        $Object['about'] = $this->getAbout();
        $Object['category_id'] = $this->getCategoryId();
        $Object['discount'] = DiscountResource::collection($this->discounts);
        $Object['ProviderAddresses'] =  ProviderAddressResource::collection($this->provider_addresses);
        $is_favorite = false;
        if (auth('api')->check()) {
            $is_favorite = (bool)Favorite::where('user_id',auth()->user()->getId())->where('provider_id',$this->id)->first();
        }
        $Object['is_favorite'] = $is_favorite;
        return $Object;


    }

}

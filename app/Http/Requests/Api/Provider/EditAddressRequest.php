<?php

namespace App\Http\Requests\Api\Provider;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Provider\ProviderAddressResource;
use App\Models\Provider;
use App\Models\ProviderAddress;
use Illuminate\Http\JsonResponse;

class EditAddressRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'provider_address_id'=>'required|exists:provider_addresses,id',
            'country_id'=>'required|exists:countries,id',
            'city_id'=>'required|exists:cities,id',
            'address'=>'required|string|max:255',
        ];
    }
    public function run(): JsonResponse
    {
        $Provider = (new Provider())->find($this->provider_address_id);
        $ProviderAddress = new ProviderAddress();
        $ProviderAddress->setProviderId($Provider->getId());
        $ProviderAddress->setCountryId($this->country_id);
        $ProviderAddress->setCityId($this->city_id);
        $ProviderAddress->setAddress($this->address);
        $ProviderAddress->save();
        $ProviderAddress->refresh();
        return $this->successJsonResponse([__('messages.updated_successful')],new ProviderAddressResource($ProviderAddress),'ProviderAddress');
    }
}

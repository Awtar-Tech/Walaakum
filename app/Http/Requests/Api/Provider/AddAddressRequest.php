<?php

namespace App\Http\Requests\Api\Provider;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Provider\ProviderAddressResource;
use App\Models\Provider;
use App\Models\ProviderAddress;
use Illuminate\Http\JsonResponse;

class AddAddressRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'country_id'=>'required|exists:countries,id',
            'city_id'=>'required|exists:cities,id',
            'address'=>'required|string|max:255',
        ];
    }
    public function run(): JsonResponse
    {
        $User = auth()->user();
        $Provider = (new Provider())->where('user_id',$User->getId())->first();
        $ProviderAddress = new ProviderAddress();
        $ProviderAddress->setUserId($User->getId());
        $ProviderAddress->setProviderId($Provider->getId());
        $ProviderAddress->setCountryId($this->country_id);
        $ProviderAddress->setCityId($this->city_id);
        $ProviderAddress->setAddress($this->address);
        $ProviderAddress->save();
        $ProviderAddress->refresh();
        return $this->successJsonResponse([__('messages.created_successful')],new ProviderAddressResource($ProviderAddress),'ProviderAddress');
    }
}

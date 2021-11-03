<?php

namespace App\Http\Requests\Api\Provider;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Provider\ProviderAddressResource;
use App\Models\ProviderAddress;
use Illuminate\Http\JsonResponse;

class ShowAddressRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'provider_address_id'=>'required|exists:provider_addresses,id'
        ];
    }
    public function run(): JsonResponse
    {
        return $this->successJsonResponse([],new ProviderAddressResource(ProviderAddress::find($this->provider_address_id)),'ProviderAddress');
    }
}

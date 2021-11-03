<?php

namespace App\Http\Requests\Api\Provider;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Provider\ProviderAddressResource;
use App\Models\ProviderAddress;
use Illuminate\Http\JsonResponse;

class AddressRequest extends ApiRequest
{
    public function run(): JsonResponse
    {
        return $this->successJsonResponse([],ProviderAddressResource::collection(ProviderAddress::where('user_id',auth()->user()->getId())->first()),'ProviderAddresses');
    }
}

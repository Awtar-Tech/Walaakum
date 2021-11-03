<?php

namespace App\Http\Requests\Api\Provider;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Provider\ProviderAddressResource;
use App\Models\Provider;
use App\Models\ProviderAddress;
use Illuminate\Http\JsonResponse;

class DeleteAddressRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'provider_address_id'=>'required|exists:provider_addresses,id',
        ];
    }
    public function run(): JsonResponse
    {
        $Provider = (new Provider())->find($this->provider_address_id);
        $Provider->delete();
        return $this->successJsonResponse([__('messages.deleted_successfully')]);
    }
}

<?php

namespace App\Http\Requests\Api\Provider;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Provider\ProviderResource;
use App\Models\Provider;
use Illuminate\Http\JsonResponse;

class ShowRequest extends ApiRequest
{
    public function run(): JsonResponse
    {
        return $this->successJsonResponse([],new ProviderResource(Provider::where('user_id',auth()->user()->getId())->first()),'Provider');
    }
}

<?php

namespace App\Http\Requests\Api\Discount;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\General\DiscountResource;
use App\Models\Discount;
use Illuminate\Http\JsonResponse;

class IndexRequest extends ApiRequest
{
    public function run(): JsonResponse
    {
        $discount = DiscountResource::collection(Discount::where('active',true)->get());
        return $this->successJsonResponse([],['Discount'=>$discount]);
    }
}

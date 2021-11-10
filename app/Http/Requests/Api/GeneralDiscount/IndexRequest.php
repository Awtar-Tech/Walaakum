<?php

namespace App\Http\Requests\Api\GeneralDiscount;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\General\AdvertisementResource;
use App\Http\Resources\Api\General\GeneralDiscountResource;
use App\Http\Resources\Api\Ticket\TicketResource;
use App\Models\Advertisement;
use App\Models\GeneralDiscount;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;

class IndexRequest extends ApiRequest
{
    public function run(): JsonResponse
    {
        $general_discount = GeneralDiscountResource::collection(GeneralDiscount::where('active',true)->get());
        return $this->successJsonResponse([],['General_Discount'=>$general_discount]);
    }
}

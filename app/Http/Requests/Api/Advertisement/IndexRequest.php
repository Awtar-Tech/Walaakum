<?php

namespace App\Http\Requests\Api\Advertisement;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\General\AdvertisementResource;
use App\Http\Resources\Api\Ticket\TicketResource;
use App\Models\Advertisement;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;

class IndexRequest extends ApiRequest
{
    public function run(): JsonResponse
    {
        $advertisements = AdvertisementResource::collection(Advertisement::where('active',true)->get());
        return $this->successJsonResponse([],['Advertisements'=>$advertisements]);
    }
}

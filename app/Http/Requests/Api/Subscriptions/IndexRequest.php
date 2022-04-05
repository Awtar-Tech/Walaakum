<?php

namespace App\Http\Requests\Api\Subscriptions;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Subscriptions\SubscriptionResource;
use App\Http\Resources\Api\Transaction\TransactionResource;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

/**
 * @property mixed per_page
 */
class IndexRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function run(): JsonResponse
    {
        $Objects = Subscription::where('active',true)->orderBy('created_at','desc')->paginate($this->per_page?:10);
        return $this->successJsonResponse([],SubscriptionResource::collection($Objects->items()),'Subscriptions',$Objects);
    }
}

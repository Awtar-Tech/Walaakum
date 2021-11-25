<?php

namespace App\Http\Requests\Api\Discount;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\General\DiscountResource;
use App\Models\Discount;
use App\Models\Provider;
use Illuminate\Http\JsonResponse;

class StoreRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'amount'=>'required',
            'description'=>'required|string',
        ];
    }
    public function run(): JsonResponse
    {
        $discount =new  Discount();
        $User = auth()->user();
        $provider = Provider::where('user_id', $User->getId())->first();
        $discount->setProviderId($provider->getId());
        $discount->setAmount($this->amount);
        $discount->setDescription($this->description);
        $discount->save();
        $discount->refresh();

        return $this->successJsonResponse([__('messages.created_successful')],new DiscountResource($discount),'Discount');

    }
}

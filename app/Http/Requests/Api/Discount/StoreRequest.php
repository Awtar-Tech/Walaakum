<?php

namespace App\Http\Requests\Api\Discount;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\General\DiscountResource;
use App\Models\Discount;
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
        $discount->setAmount($this->amount);
        $discount->setDescription($this->description);
        $discount->save();
        $discount->refresh();

        return $this->successJsonResponse([__('messages.created_successful')],new DiscountResource($discount),'Discount');

    }
}

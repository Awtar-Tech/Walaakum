<?php

namespace App\Http\Requests\Api\Discount;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\General\DiscountResource;
use App\Models\Discount;
use Illuminate\Http\JsonResponse;

class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'discount_id' => 'required|exists:discounts,id',
            'amount'=>'sometimes',
            'description'=>'sometimes|string',
        ];
    }
    public function run(): JsonResponse
    {
        $Object = (new Discount)->find($this->discount_id);
        if ($this->filled('amount')) {
            $Object->setAmount($this->amount);
        }
        if ($this->filled('description')) {
            $Object->setDescription($this->description);
        }
        $Object->save();
        return $this->successJsonResponse( [__('messages.updated_successful')], new DiscountResource($Object),'Discount');
    }
}

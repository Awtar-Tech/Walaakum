<?php

namespace App\Http\Requests\Api\Discount;

use App\Http\Requests\Api\ApiRequest;
use App\Models\Discount;
use Illuminate\Http\JsonResponse;

class DeleteRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'discount_id' => 'required|exists:discounts,id'
        ];
    }

    public function run(): JsonResponse
    {
        $discount =(new Discount())->find($this->discount_id);
        $discount->delete();
        return $this->successJsonResponse([__('messages.deleted_successfully')]);
    }
}

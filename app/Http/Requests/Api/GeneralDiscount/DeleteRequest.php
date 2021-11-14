<?php

namespace App\Http\Requests\Api\GeneralDiscount;

use App\Http\Requests\Api\ApiRequest;
use App\Models\GeneralDiscount;
use App\Models\Order;
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
            'general_discount_id' => 'required|exists:general_discounts,id'
        ];
    }

    public function run(): JsonResponse
    {
        $Order =(new GeneralDiscount())->find($this->general_discount_id);
        $Order->delete();
        return $this->successJsonResponse([__('messages.deleted_successfully')]);
    }
}

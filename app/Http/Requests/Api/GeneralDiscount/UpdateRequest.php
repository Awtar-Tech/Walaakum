<?php

namespace App\Http\Requests\Api\GeneralDiscount;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\General\GeneralDiscountResource;
use App\Http\Resources\Api\Provider\ProviderResource;
use App\Models\GeneralDiscount;
use App\Models\Provider;
use Illuminate\Http\JsonResponse;

class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'general_discount_id' => 'required|exists:general_discounts,id',
            'name'=>'sometimes|string',
            'name_ar'=>'sometimes|string',
            'image' => 'sometimes|mimes:jpeg,jpg,png',
            'type'=>'sometimes',
            'code'=>'sometimes',
            'url' => 'sometimes'
        ];
    }
    public function run(): JsonResponse
    {
        $Object = (new GeneralDiscount)->find($this->general_discount_id);
        if ($this->filled('name')) {
            $Object->setName($this->name);
        }
        if ($this->filled('name_ar')) {
            $Object->setNameAr($this->name_ar);
        }
        if ($this->filled('image')) {
            $Object->setImage($this->image);
        }
        if ($this->filled('type')) {
            $Object->setImage($this->type);
        }
        if ($this->filled('code')) {
            $Object->setImage($this->code);
        }
        if ($this->filled('url')) {
            $Object->setImage($this->url);
        }
        $Object->save();
        return $this->successJsonResponse( [__('messages.updated_successful')], new GeneralDiscountResource($Object),'General_Discount');
    }
}

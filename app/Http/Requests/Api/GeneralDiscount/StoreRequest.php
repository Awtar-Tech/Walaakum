<?php

namespace App\Http\Requests\Api\GeneralDiscount;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\General\GeneralDiscountResource;
use App\Http\Resources\Api\Ticket\TicketResource;
use App\Models\GeneralDiscount;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;

class StoreRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name'=>'required|string',
            'name_ar'=>'required|string',
            'image' => 'required|mimes:jpeg,jpg,png',
            'type'=>'required',
            'code'=>'required',
            'url' => 'required'
        ];
    }
    public function run(): JsonResponse
    {
        $general_discount =new  GeneralDiscount();
        $User = auth()->user();
        $general_discount->setName($this->name);
        $general_discount->setNameAr($this->name_ar);
        $general_discount->setImage($this->image);
        $general_discount->setType($this->type);
        $general_discount->setCode($this->code);
        $general_discount->setUrl($this->url);
        $general_discount->save();
        $general_discount->refresh();

        return $this->successJsonResponse([__('messages.created_successful')],new GeneralDiscountResource($general_discount),'General Discount');

    }
}

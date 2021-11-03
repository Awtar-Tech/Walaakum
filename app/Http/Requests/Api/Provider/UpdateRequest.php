<?php

namespace App\Http\Requests\Api\Provider;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Provider\ProviderResource;
use App\Models\Provider;
use Illuminate\Http\JsonResponse;

class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'store_name' => 'string|max:255,',
            'store_owner_name' => 'string|max:255,',
            'commercial_register_number' => 'string|max:255,',
            'commercial_register_image' => 'mimes:jpeg,jpg,bmp,png,',
        ];
    }
    public function run(): JsonResponse
    {
        $Provider = Provider::where('user_id',auth()->user()->getId())->first();
        if (!$Provider) {
            $Provider = new Provider();
            $Provider->setUserId(auth()->user()->getId());
        }
        if ($this->filled('store_name')) {
            $Provider->setStoreName($this->store_name);
        }
        if ($this->filled('store_owner_name')) {
            $Provider->setStoreOwnerName($this->store_owner_name);
        }
        if ($this->filled('commercial_register_number')) {
            $Provider->setCommercialRegisterNumber($this->commercial_register_number);
        }
        if ($this->filled('commercial_register_image')) {
            $Provider->setCommercialRegisterImage($this->commercial_register_image);
        }
        $Provider->save();
        return $this->successJsonResponse( [__('messages.updated_successful')], new ProviderResource($Provider),'Provider');
    }
}

<?php

namespace App\Http\Requests\Api\Home;

use App\Http\Requests\Api\ApiRequest;
use App\Models\AdvertisementRequest;
use App\Models\Provider;
use Illuminate\Http\JsonResponse;

class RequestAdvertisementRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name'=>'required|string|max:255',
            'email'=>'required|string|max:255',
            'details'=>'required|string',
        ];
    }
    public function run(): JsonResponse
    {
        $User = auth()->user();
        $Provider = (new Provider())->where('user_id',$User->getId())->first();
        $AdvertisementRequest = new AdvertisementRequest();
        $AdvertisementRequest->setUserId($User->getId());
        $AdvertisementRequest->setProviderId($Provider->getId());
        $AdvertisementRequest->setName($this->name);
        $AdvertisementRequest->setEmail($this->email);
        $AdvertisementRequest->setDetails($this->details);
        $AdvertisementRequest->save();
        $AdvertisementRequest->refresh();
        return $this->successJsonResponse([__('messages.created_successful')]);
    }
}

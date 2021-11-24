<?php

namespace App\Http\Requests\Api\Provider;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Provider\ProviderResource;
use App\Models\Favorite;
use App\Models\Provider;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

/**
 * @property mixed provider_id
 */
class ToggleFavoriteRequest extends ApiRequest
{
    use ResponseTrait;

    public function rules():array
    {
        return [
            'provider_id'=>'required|exists:providers,id',
        ];
    }

    public function persist(): JsonResponse
    {
        $Provider = (new Provider())->find($this->provider_id);
        $logged = auth()->user();
        $Object = (new Favorite())->where('provider_id',$Provider->getId())->where('user_id',$logged->getId())->first();
        if (!$Object){
            $Object = new Favorite();
            $Object->setProviderId($Provider->getId());
            $Object->setUserId($logged->getId());
            $Object->save();
        }else{
            $Object->delete();
        }
        return $this->successJsonResponse([__('messages.updated_successful')],new ProviderResource($Provider),'Provider');
    }
}

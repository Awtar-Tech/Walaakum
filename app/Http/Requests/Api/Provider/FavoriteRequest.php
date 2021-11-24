<?php

namespace App\Http\Requests\Api\Provider;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Provider\ProviderResource;
use App\Models\Favorite;
use App\Models\Provider;
use Illuminate\Http\JsonResponse;

class FavoriteRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function run(): JsonResponse
    {
        $provider_ids = (new Favorite())->where('user_id',auth()->user()->getId())->pluck('provider_id');
        $Objects = new Provider();
        $Objects = $Objects->whereIn('id',$provider_ids);
        if ($this->filled('category_id')) {
            $Objects = $Objects->where('category_id',$this->category_id);
        }
        if ($this->filled('q')) {
            $q = $this->q;
            $Objects = $Objects->where(function ($query) use ($q){
                return $query->where('store_name','Like','%'.$q.'%')
                    ->orWhere('about','Like','%'.$q.'%');
            });
        }
        $Objects = $Objects->paginate($this->filled('per_page')?$this->per_page:10);
        return $this->successJsonResponse([],ProviderResource::collection($Objects->items()),'Providers',$Objects);
    }
}

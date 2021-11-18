<?php

namespace App\Http\Requests\Api\Provider;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Provider\ProviderResource;
use App\Models\Provider;
use Illuminate\Http\JsonResponse;

class IndexRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id'=> 'nullable|exists:categories,id'
        ];
            }
    public function run(): JsonResponse
    {
        $Providers = ProviderResource::collection(Provider::where('active',true)->get());
        if (filled($this->category_id)){
            $Providers = ProviderResource::collection(Provider::where('active',true)->where('category_id',$this->category_id)->get());
        }
        return $this->successJsonResponse([],['Providers'=>$Providers]);
    }
}

<?php

namespace App\Http\Requests\Api\Provider;

use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\Provider\ProviderResource;
use App\Models\Provider;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'store_name' => 'string|max:255,',
            'about' => 'string|max:255,',
            'image' => 'mimes:jpeg,jpg,bmp,png,',
            'category_id'=> 'nullable|exists:categories,id'
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
        if ($this->filled('about')) {
            $Provider->setAbout($this->about);
        }
        if ($this->image) {
            $Provider->setImage($this->image);
        }
        if ($this->filled('category_id')) {
            $Provider->setCategoryId($this->category_id);
        }
        $Provider->save();
        return $this->successJsonResponse( [__('messages.updated_successful')], new ProviderResource($Provider),'Provider');
    }
}

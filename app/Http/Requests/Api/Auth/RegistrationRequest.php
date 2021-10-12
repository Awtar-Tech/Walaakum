<?php

namespace App\Http\Requests\Api\Auth;

use App\Helpers\Constant;
use App\Helpers\Functions;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\User\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class RegistrationRequest extends ApiRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|min:6|unique:users',
            'mobile' => 'required|numeric|min:6|unique:users',
            'password' => 'required|string|min:6',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'type' => 'required|in:'.Constant::USER_TYPE_RULES,
            'device_token' => 'string|required_with:device',
            'device_type' => 'string|required_with:device_token',
        ];
    }
    public function attributes(): array
    {
        return [];
    }
    public function persist(): JsonResponse
    {
        $user = new User();
        $user->setName($this->name);
        $user->setEmail($this->email);
        $user->setMobile($this->mobile);
        $user->setType($this->type);
        $user->setPassword($this->password);
        $user->setCountryId($this->country_id);
        $user->setCityId($this->city_id);
        if ($this->filled('device_token') && $this->filled('device_type')) {
            $user->setDeviceToken($this->device_token);
            $user->setDeviceType($this->device_type);
        }
        $user->save();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();
        $user->refresh();
        try {
            Functions::SendVerification($user);
        }catch (\Exception $e){
        }
        return $this->successJsonResponse( [__('auth.login')], new UserResource($user,$tokenResult->accessToken),'User');
    }

}

<?php

namespace App\Http\Resources\Api\User;

use App\Helpers\Constant;
use App\Http\Resources\Api\Provider\ProviderResource;
use App\Models\Provider;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    protected $token;
    public function __construct($resource, $token =null)
    {
        $this->token = $token;
        parent::__construct($resource);
    }
    public function toArray($request) :array
    {
        $Object['id'] = $this->getId();
        $Object['name'] = $this->getName();
        $Object['email'] = $this->getEmail();
        $Object['mobile'] = $this->getMobile();
        $Object['image'] = $this->getImage();
        $Object['type'] = $this->getType();
        $Object['mobile_verified'] = $this->isMobileVerified();
        $Object['email_verified'] = $this->isEmailVerified();
        $Object['notification_count'] = $this->notifications()->where('read_at',null)->count();
        $Object['access_token'] = $this->token;
        $Object['token_type'] = 'Bearer';
        /*** flag here ****/
        if ($this->getType() == Constant::USER_TYPE['Provider']) {
            $provider = Provider::where('user_id', $Object['id'])->first();
            if($provider){
                $provider_image = $provider->image;
                $provider_store_name = $provider->store_name;
                $provider_about = $provider->about;
                if ($provider_image != null && $provider_store_name != null && $provider_about != null) {
                    $Object['profile_completed'] = true;
                } else {
                    $Object['profile_completed'] = false;
                }
            }else {
                $Object['profile_completed'] = false;
            }
        }
        return $Object;
    }

}

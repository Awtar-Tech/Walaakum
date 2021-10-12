<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Constant;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Home\CityResource;
use App\Http\Resources\Api\Home\CountryResource;
use App\Http\Resources\Api\Home\SplashScreensResource;
use App\Models\City;
use App\Models\Country;
use App\Models\Setting;
use App\Models\SplashScreen;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    use ResponseTrait;

    public function install(): JsonResponse
    {
        $Countries = CountryResource::collection(Country::where('active',true)->get());
        $Cities = CityResource::collection(City::where('active',true)->get());
        $SplashScreens = SplashScreensResource::collection(SplashScreen::where('active',true)->orderBy('order','desc')->get());
        $Settings = Setting::pluck((app()->getLocale() =='en')?'value':'value_ar','key')->toArray();
        return $this->successJsonResponse([],[
            'Countries'=>$Countries,
            'Cities'=>$Cities,
            'SplashScreens'=>$SplashScreens,
            'Settings'=>$Settings,
            'Essentials'=>[
                'UserTypes'=>Constant::USER_TYPE,
                'ForgetPasswordTypes'=>Constant::FORGET_TYPE,
                'VerificationTypes'=>Constant::VERIFICATION_TYPE,
                'NotificationTypes'=>Constant::NOTIFICATION_TYPE,
            ]
        ]);
    }
}

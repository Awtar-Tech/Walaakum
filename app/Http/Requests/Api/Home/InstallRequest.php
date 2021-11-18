<?php

namespace App\Http\Requests\Api\Home;

use App\Helpers\Constant;
use App\Http\Requests\Api\ApiRequest;
use App\Http\Resources\Api\General\GeneralDiscountResource;
use App\Http\Resources\Api\Home\CategoriesResource;
use App\Http\Resources\Api\Home\CityResource;
use App\Http\Resources\Api\Home\CountryResource;
use App\Http\Resources\Api\Home\SplashScreensResource;
use App\Http\Resources\Api\Home\SubscriptionsResource;
use App\Http\Resources\Api\Provider\ProviderResource;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\GeneralDiscount;
use App\Models\Provider;
use App\Models\Setting;
use App\Models\SplashScreen;
use App\Models\Subscription;
use Illuminate\Http\JsonResponse;

class InstallRequest extends ApiRequest
{
    public function run(): JsonResponse
    {
        $Countries = CountryResource::collection(Country::where('active',true)->get());
        $Cities = CityResource::collection(City::where('active',true)->get());
        $SplashScreens = SplashScreensResource::collection(SplashScreen::where('active',true)->orderBy('order','desc')->get());
        $General_Discount = GeneralDiscountResource::collection(GeneralDiscount::where('active', true)->get());
        $most_watched = ProviderResource::collection(Provider::where('active', true)->inRandomOrder()->limit(5)->get());
        $Categories = CategoriesResource::collection(Category::where('active', true)->get());
        $Subscriptions = SubscriptionsResource::collection(Subscription::where('active', true)->get());
        $Settings = Setting::pluck((app()->getLocale() =='en')?'value':'value_ar','key')->toArray();
        return $this->successJsonResponse([],[
            'Countries'=>$Countries,
            'Cities'=>$Cities,
            'SplashScreens'=>$SplashScreens,
            'Categories' => $Categories,
            'Subscriptions' => $Subscriptions,
            'General_discount' => $General_Discount,
            'Most_watched' => $most_watched,
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

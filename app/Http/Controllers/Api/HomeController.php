<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Home\FaqRequest;
use App\Http\Requests\Api\Home\InstallRequest;
use App\Http\Requests\Api\Home\RequestAdvertisementRequest;
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

    public function install(InstallRequest $request): JsonResponse
    {
        return $request->run();
    }

    public function faqs(FaqRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function request_advertisement(RequestAdvertisementRequest $request): JsonResponse
    {
        return $request->run();
    }
}

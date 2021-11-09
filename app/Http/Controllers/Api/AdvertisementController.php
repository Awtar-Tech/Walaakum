<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Advertisement\IndexRequest;
use Illuminate\Http\JsonResponse;

class AdvertisementController extends Controller
{
    public function index(IndexRequest $request): JsonResponse
    {
        return $request->run();
    }

}

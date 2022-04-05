<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Subscriptions\IndexRequest;
use App\Http\Requests\Api\Subscriptions\StoreRequest;
use Illuminate\Http\JsonResponse;

class SubscriptionsController extends Controller
{
    public function index(IndexRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function store(StoreRequest $request): JsonResponse
    {
        return $request->run();
    }
}

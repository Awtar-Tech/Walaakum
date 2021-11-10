<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GeneralDiscount\IndexRequest;
use App\Http\Requests\Api\GeneralDiscount\StoreRequest;
use App\Http\Requests\Api\GeneralDiscount\UpdateRequest;
use Illuminate\Http\JsonResponse;

class GeneralDiscountController extends Controller
{
    public function index(IndexRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function store(StoreRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function update(UpdateRequest $request): JsonResponse
    {
        return $request->run();
    }
}

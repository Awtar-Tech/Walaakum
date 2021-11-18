<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Discount\DeleteRequest;
use App\Http\Requests\Api\Discount\IndexRequest;
use App\Http\Requests\Api\Discount\StoreRequest;
use App\Http\Requests\Api\Discount\UpdateRequest;
use Illuminate\Http\JsonResponse;

class DiscountController extends Controller
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
    public function delete(DeleteRequest $request):JsonResponse
    {
        return $request->run();
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Provider\AddAddressRequest;
use App\Http\Requests\Api\Provider\AddressRequest;
use App\Http\Requests\Api\Provider\EditAddressRequest;
use App\Http\Requests\Api\Provider\ShowAddressRequest;
use App\Http\Requests\Api\Provider\ShowRequest;
use App\Http\Requests\Api\Provider\UpdateRequest;
use Illuminate\Http\JsonResponse;

class ProviderController extends Controller
{

    public function show(ShowRequest $request): JsonResponse
    {
        return $request->run();
    }

    public function update(UpdateRequest $request): JsonResponse
    {
        return $request->run();
    }

    public function addresses(AddressRequest $request): JsonResponse
    {
        return $request->run();
    }


    public function address(ShowAddressRequest $request): JsonResponse
    {
        return $request->run();
    }

    public function add_address(AddAddressRequest $request): JsonResponse
    {
        return $request->run();
    }

    public function edit_address(EditAddressRequest $request): JsonResponse
    {
        return $request->run();
    }

    public function delete_address(EditAddressRequest $request): JsonResponse
    {
        return $request->run();
    }


}

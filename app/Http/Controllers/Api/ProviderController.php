<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Provider\AddAddressRequest;
use App\Http\Requests\Api\Provider\DeleteAddressRequest;
use App\Http\Requests\Api\Provider\IndexRequest;
use App\Http\Requests\Api\Provider\MyAddressRequest;
use App\Http\Requests\Api\Provider\EditAddressRequest;
use App\Http\Requests\Api\Provider\MeRequest;
use App\Http\Requests\Api\Provider\ShowAddressRequest;
use App\Http\Requests\Api\Provider\UpdateRequest;
use Illuminate\Http\JsonResponse;

class ProviderController extends Controller
{
    public function index(IndexRequest $request): JsonResponse
    {
        return $request->run();
    }

    public function me(MeRequest $request): JsonResponse
    {
        return $request->run();
    }

    public function update(UpdateRequest $request): JsonResponse
    {
        return $request->run();
    }

    public function my_addresses(MyAddressRequest $request): JsonResponse
    {
        return $request->run();
    }


    public function show_address(ShowAddressRequest $request): JsonResponse
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

    public function delete_address(DeleteAddressRequest $request): JsonResponse
    {
        return $request->run();
    }
}

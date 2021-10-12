<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Auth\ForgetPasswordRequest;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\LogoutRequest;
use App\Http\Requests\Api\Auth\PasswordRequest;
use App\Http\Requests\Api\Auth\RefreshRequest;
use App\Http\Requests\Api\Auth\RegistrationRequest;
use App\Http\Requests\Api\Auth\ResendVerifyRequest;
use App\Http\Requests\Api\Auth\ResetPasswordRequest;
use App\Http\Requests\Api\Auth\ShowRequest;
use App\Http\Requests\Api\Auth\UpdateRequest;
use App\Http\Requests\Api\Auth\VerifyRequest;
use App\Models\Log;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function register(RegistrationRequest $request): JsonResponse
    {
        return $request->persist();
    }

    public function login(LoginRequest $request): JsonResponse
    {
        return $request->persist();
    }

    public function show(ShowRequest $request): JsonResponse
    {
        return $request->persist();
    }

    public function logout(LogoutRequest $request): JsonResponse
    {
        return $request->persist();
    }

    public function update(UpdateRequest $request): JsonResponse
    {
        return $request->persist();
    }

    public function refresh(RefreshRequest $request): JsonResponse
    {
         return $request->persist();
    }

    public function change_password(PasswordRequest $request): JsonResponse
    {
        return $request->persist();
    }

    public function resend_verify(ResendVerifyRequest $request): JsonResponse
    {
        return $request->persist();
    }

    public function verify(VerifyRequest $request): JsonResponse
    {
         return $request->persist();
    }

    public function forget_password(ForgetPasswordRequest $request): JsonResponse
    {
        return $request->persist();
    }

    public function reset_password(ResetPasswordRequest $request): JsonResponse
    {
        return $request->persist();
    }
}

<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Services\User\RegisterService;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function __construct(private RegisterService $registerService) {}

    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $this->registerService->register($request->getDto());

        return response()->json();
    }
}

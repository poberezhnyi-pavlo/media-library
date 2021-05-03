<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\CreateModelException;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Services\User\RegisterService;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function __construct(private RegisterService $registerService) {}

    /**
     * @OA\Post(
     *     path="/register",
     *     tags={"Auth"},
     *     summary="Реєстрація нового користувача",
     *     @OA\Response(
     *         response="200",
     *         description="register user",
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(ref="#/components/schemas/RegisterRequest"),
     *         )
     *     )
     * )
     *
     * @throws CreateModelException
     */
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $this->registerService->register($request->getDto());

        return response()->json();
    }
}

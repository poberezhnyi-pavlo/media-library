<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\CreateModelException;
use App\Exceptions\LoginException;
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
     *         description="Реєастрація користувача",
     *         @OA\JsonContent(ref="#/components/schemas/TokenResponse")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Помилка валідацуії"
     *     ),
     *      @OA\Response(
     *         response=400,
     *         description="Помилка авторизації/реєастрації користувача",
     *         @OA\JsonContent(ref="#/components/schemas/ExceptionResponse")
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
     * @throws LoginException
     */
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $token = $this->registerService->register($request->getDto());

        return response()->json(['token' => $token], 200);
    }
}

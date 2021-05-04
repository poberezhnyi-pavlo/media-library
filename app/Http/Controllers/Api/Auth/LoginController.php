<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\LoginException;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Services\User\LoginService;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function __construct(private LoginService $loginService) {}

    /**
     * @OA\Post(
     *     path="/login",
     *     tags={"Auth"},
     *     summary="Логін користвача",
     *     @OA\Response(
     *         response="200",
     *         description="Користувач успішно за логілогінився на сайті",
     *         @OA\JsonContent(ref="#/components/schemas/TokenResponse")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Помилка валідацуії"
     *     ),
     *      @OA\Response(
     *         response=400,
     *         description="Помилка авторизації",
     *         @OA\JsonContent(ref="#/components/schemas/ExceptionResponse")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *     )
     * )
     *
     * @throws LoginException
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $token = $this->loginService->login($request->getDto());

        return response()->json(['token' => $token],200);
    }
}

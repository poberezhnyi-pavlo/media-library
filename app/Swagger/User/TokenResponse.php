<?php

namespace App\Swagger\User;

/**
 * @OA\Schema(
 *     description="Токен",
 *     type="object",
 *     title="Токен",
 * )
 */
final class TokenResponse
{
    /**
     * @OA\Property(
     *     property="token",
     *     type="string",
     *     example="7|35CbQO747R2PKcAjmvW5CSurms32ZQMW1zhI6SW7",
     * )
     */
    public string $token;
}

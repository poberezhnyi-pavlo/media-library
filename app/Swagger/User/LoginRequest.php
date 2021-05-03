<?php

namespace App\Swagger\User;

/**
 * @OA\Schema(
 *     description="Request логінування користувача",
 *     type="object",
 *     title="Логінування користувача",
 *     required={"email", "password"}
 * )
 */
final class LoginRequest
{
    /**
     * @OA\Property(
     *     title="email",
     *     description="Email користувача",
     *     format="email",
     *     example="email@example"
     * )
     */
    public string $email;

    /**
     * @OA\Property(
     *     title="Пароль",
     *     description="Пароль користувача",
     *     format="password",
     *     example="password"
     * )
     */
    public string $password;
}

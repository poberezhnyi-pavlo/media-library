<?php

namespace App\Swagger\User;

/**
 * @OA\Schema(
 *     description="Request ркєстрації користувача",
 *     type="object",
 *     title="Реєастрація користувача",
 *     required={"first_name", "last_name", "email", "password", "password_confirmation", "birthday"}
 * )
 */
class RegisterRequest
{
    /**
     * @OA\Property(
     *     title="Імя",
     *     description="Імя користувача",
     *     format="string",
     *     example="Firstname"
     * )
     */
    public string $first_name;

    /**
     * @OA\Property(
     *     title="Призвіще",
     *     description="Прізвище користувача",
     *     format="string",
     *     example="Lastname"
     * )
     */
    public string $last_name;

    /**
     * @OA\Property(
     *     title="email",
     *     description="Email user",
     *     format="email",
     *     example="example@email.com"
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

    /**
     * @OA\Property(
     *     title="Повтори пароль",
     *     description="Повтори пароль",
     *     format="password",
     *     example="password"
     * )
     */
    public string $password_confirmation;

    /**
     * @OA\Property(
     *     title="День народження",
     *     description="День народження користувача",
     *     format="date",
     *     example="2020-10-20"
     * )
     */
    public string $birthday;

    /**
     * @OA\Property(
     *     title="Аватар",
     *     description="Аватар коритсувача",
     *     format="binary",
     * )
     */
    public string $avatar;

}

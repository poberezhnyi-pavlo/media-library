<?php

namespace App\Swagger\User;

/**
 * @OA\Schema(
 *     description="Exception",
 *     type="object",
 *     title="Exception",
 * )
 */
class ExceptionResponse
{
    /**
     * @OA\Property(
     *     property="message",
     *     type="string",
     *     example="Ви вели невірні дані!",
     * )
     */
    public string $message;
}

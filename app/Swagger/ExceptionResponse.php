<?php

namespace App\Swagger;

/**
 * @OA\Schema(
 *     description="Exception",
 *     type="object",
 *     title="Exception",
 * )
 */
final class ExceptionResponse
{
    /**
     * @OA\Property(
     *     property="message",
     *     type="string",
     *     example="Якась помилка",
     * )
     */
    public string $message;
}

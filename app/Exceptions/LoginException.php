<?php

namespace App\Exceptions;

use JetBrains\PhpStorm\Pure;
use Throwable;

final class LoginException extends CustomException
{
    #[Pure]
    public function __construct(
        string $message = "Ви вели невірні дані!",
        int $code = 400,
        Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }
}

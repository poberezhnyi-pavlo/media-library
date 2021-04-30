<?php

namespace App\Exceptions;

use Exception;
use Throwable;

final class CreateModelException extends Exception
{
    public function __construct(
        string $message = "Error create model",
        int $code = 400,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}

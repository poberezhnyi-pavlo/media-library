<?php

namespace App\Services\User;

use App\Dto\User\LoginDto;
use App\Models\User;

final class UserService
{
    public function getUser(LoginDto $loginDto): ?User
    {
        return User::query()
            ->where('email', $loginDto->getEmail())
            ->first()
        ;
    }
}

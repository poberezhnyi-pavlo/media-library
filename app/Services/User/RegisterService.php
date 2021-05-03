<?php

namespace App\Services\User;

use App\Dto\UserDto;
use App\Exceptions\CreateModelException;
use App\Exceptions\LoginException;

final class RegisterService
{
    public function __construct(private UserService $userService, private LoginService $loginService) {}

    /**
     * @throws CreateModelException
     * @throws LoginException
     */
    public function register(UserDto $userDto): string
    {
        $this->userService->create($userDto);

        return $this->loginService->login($userDto);
    }
}

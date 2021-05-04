<?php

namespace App\Services\User;

use App\Dto\User\LoginDto;
use App\Exceptions\LoginException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

final class LoginService
{
    public function login(LoginDto $userDto): string
    {
        $credentials = [
            'email' => $userDto->getEmail(),
            'password' => $userDto->getPassword(),
        ];

        $st = Auth::attempt($credentials);

        /** @var User $user */
        $user = \auth()->user();

        if ($user) {
            return $user->createToken('bearer')->plainTextToken;
        }

        throw new LoginException();
    }
}

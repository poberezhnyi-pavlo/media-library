<?php

namespace App\Services\User;

use App\Dto\UserDto;
use App\Exceptions\CreateModelException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class RegisterService
{
    /**
     * @throws CreateModelException
     */
    public function register(UserDto $userDto): User
    {
        $user = new User();
        $user->first_name = $userDto->getFirstName();
        $user->last_name = $userDto->getLastName();
        $user->email = $userDto->getEmail();
        $user->birthday = $userDto->getBirthday();
        $user->password = Hash::make($userDto->getPassword());

        if ($userDto->getAvatar()) {
            $user->avatar = $this->uploadAvatar($userDto->getAvatar());
        }

        if ($user->save()) {

            return $user;
        }

        throw new CreateModelException();
    }

    private function uploadAvatar(UploadedFile $uploadedFile): string
    {
        return Storage::disk()->putFileAs('users/avatars', $uploadedFile, $uploadedFile->getClientOriginalName());
    }
}

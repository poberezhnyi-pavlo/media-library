<?php

namespace App\Services\User;

use App\Models\User;
use App\Dto\UserDto;
use App\Exceptions\CreateModelException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class UserService
{
    private const AVATARS_DIR = 'users/avatars';

    public function create(UserDto $userDto): User
    {
        $user = new User();
        $this->initData($user, $userDto);

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
        return Storage::disk()->putFileAs(
            self::AVATARS_DIR,
            $uploadedFile,
            $uploadedFile->getClientOriginalName()
        );
    }

    private function initData(User $user, UserDto $userDto): void
    {
        $user->first_name = $userDto->getFirstName();
        $user->last_name = $userDto->getLastName();
        $user->email = $userDto->getEmail();
        $user->birthday = $userDto->getBirthday();
        $user->password = Hash::make($userDto->getPassword());
    }
}

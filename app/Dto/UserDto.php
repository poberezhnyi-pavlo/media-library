<?php

namespace App\Dto;

use Carbon\Carbon;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class UserDto
{
    public function __construct(
        private string $firstName,
        private string $lastName,
        private string $email,
        private string $password,
        private Carbon $birthday,
        private ?UploadedFile $avatar,
    ) {}

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getBirthday(): Carbon
    {
        return $this->birthday;
    }

    public function setBirthday(Carbon $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getAvatar(): UploadedFile
    {
        return $this->avatar;
    }

    public function setAvatar(UploadedFile $avatar): void
    {
        $this->avatar = $avatar;
    }
}

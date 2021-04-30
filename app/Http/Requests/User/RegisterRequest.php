<?php

namespace App\Http\Requests\User;

use App\Dto\UserDto;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => [
                'required',
                'string',
                'min:3',
                'max:50',
            ],
            'last_name' => [
                'required',
                'string',
                'min:3',
                'max:50',
            ],
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('users'),
            ],
            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed',
            ],
            'birthday' => [
                'required',
                'date',
            ],
            'avatar' => [
                'nullable',
                'image',
            ],
        ];
    }

    public function getDto(): UserDto
    {
        return  new UserDto(
            firstName: $this->first_name,
            lastName: $this->last_name,
            email: $this->email,
            password: $this->password,
            birthday: Carbon::parse($this->birthday),
            avatar: $this->avatar,
        );
    }
}

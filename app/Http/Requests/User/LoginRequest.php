<?php

namespace App\Http\Requests\User;

use App\Dto\User\LoginDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::exists('users'),
            ],
            'password' => [
                'required',
                'string',
            ],
        ];
    }

    public function getDto(): LoginDto
    {
        return new LoginDto(...$this->validated());
    }
}

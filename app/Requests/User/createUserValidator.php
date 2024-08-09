<?php

namespace App\Requests\User;

use App\Requests\BaseRequestFormApi;

class CreateUserValidator extends BaseRequestFormApi
{
    public function rules(): array
    {
        return [
            'name' => 'required|max:50',
            'email' => 'required|min:5|max:50|email|unique:users,email',
            'password' => 'required|min:6|max:50|string|confirmed',
        ];
    }

    public function authorized(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.max' => 'Name is too long',
            'email.required' => 'Email is required',
            'email.min' => 'Email is too short',
            'email.max' => 'Email is too long',
            'email.email' => 'Email is invalid',
            'email.unique' => 'Email is already taken',
            'password.required' => 'Password is required',
            'password.min' => 'Password is too short',
            'password.max' => 'Password is too long',
            'password.string' => 'Password must be a string',
            'password.confirmed' => 'Password confirmation does not match',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function validated()
    {
        return $this->request()->validated();
    }

    public function request()
    {
        return $this->_request;
    }

    // all
    public function all()
    {
        return $this->request()->all();
    }
}

<?php

namespace App\Http\Requests\Admin\User;

use App\Http\Requests\BaseRequest\BaseRequest;

class UserStoreRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:users,email',
            'email_verified_at' => 'nullable|date',
            'password' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'active' => 'nullable|integer',
            'gender' => 'nullable|in:male,female',
            'date_of_birth' => 'nullable|date',
            'store_name' => 'nullable|string|max:255',
            'percentage' => 'nullable|numeric|min:0|max:100',
            'type' => 'required|in:user,admin',
            'remember_token' => 'nullable|string|max:100',
        ];
    }
}

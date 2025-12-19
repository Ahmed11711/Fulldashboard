<?php

namespace App\Http\Requests\Admin\User;

use App\Http\Requests\BaseRequest\BaseRequest;

class UserUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|string|max:255|unique:users,email,' . $this->route('user') . ',id',
            'email_verified_at' => 'nullable|sometimes|date',
            'password' => 'sometimes|required|string|max:255',
            'phone' => 'nullable|sometimes|string|max:255',
            'active' => 'sometimes|required|integer',
            'gender' => 'nullable|sometimes|in:male,female',
            'date_of_birth' => 'nullable|sometimes|date',
            'store_name' => 'nullable|sometimes|string|max:255',
            'percentage' => 'nullable|numeric|min:0|max:100',
            'type' => 'sometimes|required|in:user,admin',
            'remember_token' => 'nullable|sometimes|string|max:100',
        ];
    }
}

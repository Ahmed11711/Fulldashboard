<?php

namespace App\Http\Requests\Admin\Category;

use App\Http\Requests\BaseRequest\BaseRequest;

class CategoryUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'image' => 'nullable|sometimes|file|max:2048',
            'active' => 'sometimes|required|integer',
            'description' => 'nullable|sometimes|string',
        ];
    }
}

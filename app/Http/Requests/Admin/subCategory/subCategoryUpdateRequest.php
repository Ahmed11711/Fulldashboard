<?php

namespace App\Http\Requests\Admin\subCategory;

use App\Http\Requests\BaseRequest\BaseRequest;

class subCategoryUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'sometimes|required|integer|exists:categories,id',
            'name' => 'sometimes|required|string|max:255',
            'image' => 'sometimes|required|file|max:2048',
            'desc' => 'sometimes|required|string',
            'is_active' => 'sometimes|required|integer',
        ];
    }
}

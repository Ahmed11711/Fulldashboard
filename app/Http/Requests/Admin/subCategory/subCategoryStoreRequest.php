<?php

namespace App\Http\Requests\Admin\subCategory;

use App\Http\Requests\BaseRequest\BaseRequest;

class subCategoryStoreRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required|integer|exists:categories,id',
            'name' => 'required|string|max:255',
            'image' => 'required|file|max:2048',
            'desc' => 'required|string',
            'is_active' => 'required|integer',
        ];
    }
}

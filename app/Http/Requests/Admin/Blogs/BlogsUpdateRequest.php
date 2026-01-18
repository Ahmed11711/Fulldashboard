<?php

namespace App\Http\Requests\Admin\Blogs;

use App\Http\Requests\BaseRequest\BaseRequest;

class BlogsUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'title_ar' => 'sometimes|required|string|max:255',
            'excerpt' => 'sometimes|required|string|max:255',
            'date' => 'sometimes|required|string',
            'date_ar' => 'sometimes|required|string',
            'image' => 'sometimes|required|file|max:2048',
        ];
    }
}

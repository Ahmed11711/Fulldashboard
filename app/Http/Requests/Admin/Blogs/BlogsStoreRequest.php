<?php

namespace App\Http\Requests\Admin\Blogs;

use App\Http\Requests\BaseRequest\BaseRequest;

class BlogsStoreRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'date' => 'required|string',
            'date_ar' => 'required|string',
            'image' => 'required|file|max:2048',
        ];
    }
}

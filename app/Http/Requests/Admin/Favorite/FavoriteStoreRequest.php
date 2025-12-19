<?php

namespace App\Http\Requests\Admin\Favorite;
use App\Http\Requests\BaseRequest\BaseRequest;
class FavoriteStoreRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'sub_category_id' => 'nullable|integer|exists:sub_categories,id',
        ];
    }
}

<?php

namespace App\Http\Requests\Admin\Favorite;
use App\Http\Requests\BaseRequest\BaseRequest;
class FavoriteUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'sometimes|required|integer|exists:users,id',
            'sub_category_id' => 'nullable|sometimes|integer|exists:sub_categories,id',
        ];
    }
}

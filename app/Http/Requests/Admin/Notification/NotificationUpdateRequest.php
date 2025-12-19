<?php

namespace App\Http\Requests\Admin\Notification;
use App\Http\Requests\BaseRequest\BaseRequest;
class NotificationUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'sometimes|required|integer|exists:users,id',
            'title' => 'sometimes|required|string|max:255',
            'message' => 'sometimes|required|string',
            'type' => 'nullable|sometimes|string|max:255',
            'read_at' => 'nullable|sometimes|date',
        ];
    }
}

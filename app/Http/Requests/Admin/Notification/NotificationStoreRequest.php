<?php

namespace App\Http\Requests\Admin\Notification;
use App\Http\Requests\BaseRequest\BaseRequest;
class NotificationStoreRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'type' => 'nullable|string|max:255',
            'read_at' => 'nullable|date',
        ];
    }
}

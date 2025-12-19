<?php

namespace App\Http\Requests\Admin\Order;

use App\Http\Requests\BaseRequest\BaseRequest;

class OrderUpdateRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'sometimes|required|integer|exists:users,id',
            'sub_category_id' => 'sometimes|required|integer|exists:sub_categories,id',
            'quantity' => 'sometimes|required|integer',
            'price' => 'sometimes|required|numeric',
            'status' => 'sometimes|required|in:pending,confirmed,processing,completed,cancelled',
            'payment_status' => 'sometimes|required|in:unpaid,paid,failed,refunded',
            'payment_method' => 'nullable|sometimes|string|max:255',
            'desc' => 'nullable|sometimes|string',
        ];
    }

    public function messages(): array
    {
        return [
            // ... باقي الرسائل

            'status.required' => 'Order status is required.',
            'status.in' => 'Selected order status is invalid. Allowed values: pending, confirmed, processing, completed, cancelled.',

            'payment_status.required' => 'Payment status is required.',
            'payment_status.in' => 'Selected payment status is invalid. Allowed values: unpaid, paid, failed, refunded.',

            // ... باقي الرسائل
        ];
    }
}

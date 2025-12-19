<?php

namespace App\Http\Requests\Admin\Order;

use App\Http\Requests\BaseRequest\BaseRequest;

class OrderStoreRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'sub_category_id' => 'required|integer|exists:sub_categories,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required|in:pending,confirmed,processing,completed,cancelled',
            'payment_status' => 'required|in:unpaid,paid,failed,refunded',
            'payment_method' => 'nullable|string|max:255',
            'desc' => 'nullable|string',
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

<?php

namespace App\Http\Resources\Admin\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user_name' => $this->user->name ?? null,
            'sub_category_id' => $this->sub_category_id,
            'sub_category_name' => $this->subCategory->name ?? null,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'status' => $this->status,
            'payment_status' => $this->payment_status,
            'payment_method' => $this->payment_method,
            'desc' => $this->desc,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

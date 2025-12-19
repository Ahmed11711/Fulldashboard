<?php

namespace App\Http\Resources\Admin\Favorite;

use Illuminate\Http\Resources\Json\JsonResource;

class FavoriteResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user_name' => $this->user->name ?? null,
            'sub_category_id' => $this->sub_category_id,
            'sub_category_name' => $this->subCategory->name ?? null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

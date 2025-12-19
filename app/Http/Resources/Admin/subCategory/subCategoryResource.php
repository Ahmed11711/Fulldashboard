<?php

namespace App\Http\Resources\Admin\subCategory;

use Illuminate\Http\Resources\Json\JsonResource;

class subCategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'category_name' => $this->category->name ?? null,
            'name' => $this->name,
            'image' => $this->image,
            'desc' => $this->desc,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

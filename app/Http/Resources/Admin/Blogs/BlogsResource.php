<?php

namespace App\Http\Resources\Admin\Blogs;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogsResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'title_ar' => $this->title_ar,

            'excerpt' => $this->excerpt,
            'date' => $this->date,
            'date_ar' => $this->date_ar,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

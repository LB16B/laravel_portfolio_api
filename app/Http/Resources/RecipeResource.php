<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'time' => $this->time,
            'price' => $this->price,
            'filename' => $this->filename,
            'created_at' => $this->created_at,
            'user_id' => $this->user_id
        ];
    }
}

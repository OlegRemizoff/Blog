<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "slug" => $this->slug,
            "created" => Carbon::parse($this->created_at)->format('d-m-Y H:i'),
            "updated" => Carbon::parse($this->updated_at)->format('d-m-Y H:i')
        ];
    }
}

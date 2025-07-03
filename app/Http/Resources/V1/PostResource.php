<?php

namespace App\Http\Resources\V1;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\CategoryResource;
use Illuminate\Support\Facades\Route;

class PostResource extends JsonResource
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
            "descritption" => $this->description,
            "content" => $this->when(Route::currentRouteName() == 'posts.show', $this->content) ,
            "category" => $this->category->title,
            "tags" => $this->tags->map(function($tag) {
                return $tag->title;
            }),
            "views" => $this->views,
            "thumbnail" => $this->thumbnail,
            "created" => Carbon::parse($this->created_at)->format('d-m-Y H:i'),
            "updated" => Carbon::parse($this->updated_at)->format('d-m-Y H:i')
        ];
    }
}

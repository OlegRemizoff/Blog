<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Category;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory;

    
    public function catagory () {
        return $this->belongsTo(Category::class);
    }


    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}

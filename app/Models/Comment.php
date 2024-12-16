<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Post;

use Carbon\Carbon;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_id', 'parent_id', 'content'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function posts(): BelongsTo
    {
        return $this->BelongsTo(Post::class);
    }


    public function parent()
    {
        $this->belongsTo('parent_id');
    }


    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    

    public function getCommentDate()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}

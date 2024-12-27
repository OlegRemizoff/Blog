<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = ['title', 'description', 'content', 'category_id',  'tag_id', 'thumbnail', 'user_id', ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    } 

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    } 

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments(): HasMany
    {
        // return $this->hasMany(Comment::class);
        return $this->hasMany(Comment::class)->whereNull('parent_id')->with('children');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public static function uploadImage(Request $request, $image = null) {
        if ($request->hasFile('thumbnail')) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('thumbnail')->store("images/{$folder}");
        }
        return null;
    }

    public function getImage() {
        return $this->thumbnail ? asset( 'uploads/' . $this->thumbnail) : asset('homesimple.jpg');
    }

    public function getPostDate () {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d F Y');
        // return Carbon::parse($this->created_at)->diffForHumans();
    }
    
}

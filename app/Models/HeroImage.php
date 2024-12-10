<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HeroImage extends Model
{
    use HasFactory;
    protected $fillable = ['image'];


    public static function uploadImage(Request $request, $image = null) {
        if ($request->hasFile('image')) {
            if ($image) {
                Storage::delete($image);
            }
            
            return $request->file('image')->store("banner");
        }
        return null;
    }

    public function getImage() {
        return $this->image ? asset( 'uploads/' . $this->image) : asset('no-image.jpg');
    }
}

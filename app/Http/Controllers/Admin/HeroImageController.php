<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\HeroImage;


class HeroImageController extends Controller
{
    public function index() {
        return view('admin.layouts.heroimage');
    }

    public function store(Request $request) {

        $request->validate([
            'image' => 'required|image',
        ]);



        $image = HeroImage::firstOrCreate();
        if ($image->image) {
            Storage::delete($image->image);
        }
        $data = $request->all();
        $data['image'] = HeroImage::uploadImage($request);
        $image->update($data);
        

    return redirect()->route('admin.hero.image')->with('success', 'Главное изображение обновлено');

    }



}
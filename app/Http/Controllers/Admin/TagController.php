<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required'
        ]);

        Tag::create($request->all());
        return redirect()->route('admin.tags.index')->with('success', 'Тег добавлен');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.edit', compact('tag'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required'
        ]);
        $tag = Tag::find($id);
        $tag->update($validated);
        return redirect()->route('admin.tags.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        $tag = Tag::find($id);
        if ($tag->posts->count()) {
            return redirect()->route('admin.tags.index')->with('error', 'Ошибка! У тегов есть записи');
        }
        Tag::destroy($id);
        return redirect()->route('admin.tags.index')->with('success', 'Тег удалён');
    }
}

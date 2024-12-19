<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    public function create() 
    {
        return view('user.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name, 
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        
        session()->flash('success', 'Регистрация пройдена');
        Auth::login($user);
        return redirect()->route('home');
    }

    public function loginForm() 
    {
        return view('user.login');

    } 

    public function login(Request $request) 
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            session()->flash('success', 'Вы авторизованы');
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('home');
            }
        }
        return redirect()->back()->with('error', 'Неверный логин или пароль');
        
    }
    
    public function logout(Request $request) 
    {
        Auth::logout();
        return redirect()->route('home');
    }


    public function profile()
    {
        return view('user.profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'thumbnail' => 'nullable|image',
        ]);

        $user_id = $request->input('user_id');
        $user  = User::find($user_id);

        
        // if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
        //     Storage::disk('public')->deleteDirectory("avatars/user_{$user_id}");
        //     $path = $request->file('thumbnail')->store("avatars/user_{$user_id}", 'public');
        //     $user->update(['thumbnail' => $path]);
        // }


        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            if ($user->thumbnail && Storage::disk('public')->exists($user->thumbnail)) {
                Storage::disk('public')->delete($user->thumbnail);
            }
            $path = $request->file('thumbnail')->store("avatars/", 'public');
            $user->update(['thumbnail' => $path]);
        }


        
        
        return redirect()->back()->with('success', 'Изображение обновлено');
    }
}

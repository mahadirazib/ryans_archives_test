<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $posts = Post::where('user_id', $user->id)->with(['user', 'comments'])->latest()->paginate(9);
        return view('profile.show', compact('user', 'posts'));
    }

} 
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $posts = Post::with('user')->get();
        return view('admin.index', compact('users', 'posts'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $menuPost = 'active';
        $posts = Post::latest()->get();
    
        return view('pages.posts.index_post', compact('posts', 'menuPost'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhatsappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuPost = 'active';
        $posts = Post::latest()->get();
        $total = Post::count();
        return view('whatsapp');
    }
    public function showqrcode()
    {
        // code...
    }
}
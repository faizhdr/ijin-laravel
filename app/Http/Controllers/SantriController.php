<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = auth()->user()->name;
        return view('pages.santri.index', compact('username'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menuPost = 'active';
        return view('pages.santri.form', compact('menuPost'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'tujuan' => 'required',
            'jamkeluar' => 'required',
            'jamkembali' => 'required'
        ]);

        $slug = \Str::slug($request->title);

        Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'tujuan' => $request->tujuan,
            'jamkeluar' => $request->jamkeluar,
            'jamkembali' => $request->jamkembali
        ]);

        return redirect()->back()->with(['success' => 'Perizinan telah dikirim! Mohon konfirmasi ke Ustadz Dedy']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil semua postingan yang dimiliki oleh pengguna dan urutkan dari yang terbaru
        $posts = $user->posts()->orderBy('created_at', 'desc')->get();

        return view('pages.santri.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $menuPost = 'active';
        $edit = Post::find($post->id);
        return view('pages.posts.form_edit_post', compact('menuPost', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $db = Post::find($post->id);

        $db->title = $request->title;
        $db->slug = \Str::slug($request->title);
        $db->description = $request->description;
        $db->update();

        return redirect()->back()->with(['success' => 'Licensing confirmation successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $db = Post::find($post->id);

        if ($db) {
            $db->delete();
            return redirect()->route('posts.index')->with(['succes' => 'Licensing success to delete']);
        }
        return redirect()->route('posts.index')->with(['failed' => 'Licensing failed to delete']);
    }
}

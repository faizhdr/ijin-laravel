<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class DMController extends Controller
{
    public function index()
    {
        $menuDM = 'active';

        // Ambil semua postingan dengan jurusan "Digital Marketing" dan urutkan berdasarkan yang terbaru
        $posts = Post::whereHas('user', function ($query) {
            $query->where('jurusan', 'Digital Marketing');
        })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.posts.index_dm', compact('posts', 'menuDM'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menuDM = 'active';
        $category = Category::all();
        $edit = Post::find($id);
        return view('pages.posts.form_edit_dm', compact('menuDM', 'edit', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = Post::find($id);

        $db->tujuan = $request->tujuan;
        $db->jamkeluar = $request->jamkeluar;
        $db->jamkembali = $request->jamkembali;
        $db->updated_at = $request->updated_at;
        $db->approval_u_febby = $request->approval_u_febby;
        $db->approval_u_faruq = $request->approval_u_faruq;

        $db->update();

        $pesan = "Perizinan Mahasantri". "\n";
        $pesan .= "Nama Mahasantri : " . $db->user->name . "\n";
        $pesan .= "Tujuan : " . $db->tujuan . "\n";
        $pesan .= "Jam Keluar : " . $db->jamkeluar . " WIB\n";
        $pesan .= "Jam Kembali : " . $db->jamkembali . " WIB\n";
        $pesan .= "Status U. Febby : " . $db->approval_u_febby . "\n";
        $pesan .= "Status U. Faruq : " . $db->approval_u_faruq . "\n";
        $pesan .= "Status U. Dedy  : " . $db->category->name_category . "\n";
        $posts = [
            'phone'=>$db->user->telp,
            'message'=>$pesan
        ];
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://localhost:3000',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>json_encode($posts),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        $posts1 = [
            'phone'=>$db->user->telp,
            'phone'=>'628170110454',
            'message'=>$pesan
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://localhost:3000',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>json_encode($posts),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        // Ustadz Febby
        $posts6 = [
            'phone'=>'6281334455721',
            'message'=>$pesan
        ];
        $curl6 = curl_init();
        curl_setopt_array($curl6, array(
          CURLOPT_URL => 'http://localhost:3000',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>json_encode($posts6),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));
        $response = curl_exec($curl6);
        curl_close($curl6);

        // Ustadz Faruq
        $posts7 = [
            'phone'=>'6282110905080',
            'message'=>$pesan
        ];
        $curl7 = curl_init();
        curl_setopt_array($curl7, array(
          CURLOPT_URL => 'http://localhost:3000',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>json_encode($posts7),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));
        $response = curl_exec($curl7);
        curl_close($curl7);

        return redirect()->back()->with(['success' => 'Licensing confirmation successfully!']);
    }

    public function destroy(Post $post)
    {
        $db = Post::find($post->id);

        if ($db) {
            $db->delete();
            return redirect()->route('admin.index')->with(['succes' => 'Licensing success to delete']);
        }
        return redirect()->route('admin.index')->with(['failed' => 'Licensing failed to delete']);
    }

    public function filter(Request $request)
    {
        $start_date = $request->start_date;
        $menuPost = 'active';

        $posts = Post::whereHas('user', function ($query) {
            $query->where('jurusan', 'Digital Marketing');
        })
            ->whereDate('updated_at', '>=', $start_date)
            ->get();

        return view('pages.posts.index_ppl', compact('posts', 'menuPost'));
    }
}

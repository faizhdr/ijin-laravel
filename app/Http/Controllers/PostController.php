<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menuPost = 'active';
        return view('pages.posts.form_post', compact('menuPost'));
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
            'tujuan' => 'required',
            'jamkeluar' => 'required',
            'jamkembali' => 'required',
            'category' => 'required'
        ]);

        $post = new Post;
        $post->tujuan = $request->tujuan;
        $post->jamkeluar = $request->jamkeluar;
        $post->jamkembali = $request->jamkembali;
        $post->categories_id = $request->category;
        $post->users_id = Auth::user()->id;

        $jurusan = Auth::user()->jurusan;

        // Set nilai approval_1 atau approval_2 sesuai dengan jurusan yang login
        if (auth()->user()->jurusan === 'Pengembangan Perangkat Lunak') {
            $post->approval_u_fauzan = $request->approval_u_fauzan;
            $post->approval_u_fajri = $request->approval_u_fajri;
        } elseif (auth()->user()->jurusan === 'Digital Marketing') {
            $post->approval_u_febby = $request->approval_u_febby;
            $post->approval_u_faruq = $request->approval_u_faruq;
        }

        $post->save();

        // Daftar nomor dosen per jurusan
        $nomorDosen1 = [];
        $nomorDosen2 = [];

        if ($jurusan === 'Pengembangan Perangkat Lunak') {
            $nomorDosen1 = [
                '6281335280612',
                // Tambahkan nomor lain jika ada
            ];
            $nomorDosen2 = [
                '6282110905080',
            ];
        } elseif ($jurusan === 'Digital Marketing') {
            $nomorDosen1 = [
                '6281334455721',
            ];
            $nomorDosen2 = [
                '6282110905080',
            ];
        }
        $pesan = "Perizinan Mahasantri" . "\n";
        $pesan .= "Nama Mahasantri : " . Auth::user()->name . "\n";
        $pesan .= "Jurusan : " . Auth::user()->jurusan . "\n";
        $pesan .= "Tujuan : " . $request->tujuan . "\n";
        $pesan .= "Jam Keluar : " . $request->jamkeluar . " WIB\n";
        $pesan .= "Jam Kembali : " . $request->jamkembali . " WIB\n";
        $pesan .= "Status : Menunggu Approval Dosen";
        // Kirim pesan kepada masing-masing nomor dosen
        foreach ($nomorDosen1 as $nomor1) {
            $posts = [
                'phone' => $nomor1,
                'message' => $pesan,
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
                CURLOPT_POSTFIELDS => json_encode($posts),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
        }

        foreach ($nomorDosen2 as $nomor2) {
            $posts = [
                'phone' => $nomor2,
                'message' => $pesan,
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
                CURLOPT_POSTFIELDS => json_encode($posts),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
        }

        $posts = [
            'phone' => '628170110454',
            'message' => $pesan,
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
            CURLOPT_POSTFIELDS => json_encode($posts),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        return redirect()->back()->with(['success' => 'Perizinan telah dikirim. Mohon tunggu konfirmasi via Whastapp']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $menuPost = 'active';
        $posts = Post::find($post->id);
        return view('pages.posts.show_post', compact('posts', 'menuPost'));
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
        $category = Category::all();
        $edit = Post::find($post->id);
        return view('pages.posts.form_edit_post', compact('menuPost', 'edit', 'category'));
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

        $db->tujuan = $request->tujuan;
        $db->jamkeluar = $request->jamkeluar;
        $db->jamkembali = $request->jamkembali;
        $db->updated_at = $request->updated_at;
        $db->categories_id = $request->category;

        $db->update();

        // Daftar approval per jurusan
        $approval = [];

        $jurusan = $db->user->jurusan;

        if ($jurusan === 'Pengembangan Perangkat Lunak') {
            $approval = [
                $db->approval_1
            ];
        } elseif ($jurusan === 'Digital Marketing') {
            $approval = [
                $db->approval_2
            ];
        }

        foreach ($approval as $approv) {
            $pesan = "Perizinan Mahasantri" . "\n";
            $pesan .= "Nama Mahasantri : " . $db->user->name . "\n";
            $pesan .= "Tujuan : " . $db->tujuan . "\n";
            $pesan .= "Jam Keluar : " . $db->jamkeluar . " WIB\n";
            $pesan .= "Jam Kembali : " . $db->jamkembali . " WIB\n";
            $pesan .= "Status Dosen : " . $approv . "\n";
            $pesan .= "Status Ustadz Dedy  : " . $db->category->name_category . "\n";
            $posts = [
                'phone' => $db->user->telp,
                'message' => $pesan
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
                CURLOPT_POSTFIELDS => json_encode($posts),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
        }

        // Ustadz Febby
        $posts2 = [
            'phone' => '6281334455721',
            'message' => $pesan
        ];
        $curl2 = curl_init();
        curl_setopt_array($curl2, array(
            CURLOPT_URL => 'http://localhost:3000',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($posts2),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl2);
        curl_close($curl2);

        // Ustadz Adam
        $posts3 = [
            'phone' => '6287700100111',
            'message' => $pesan
        ];
        $curl3 = curl_init();
        curl_setopt_array($curl3, array(
            CURLOPT_URL => 'http://localhost:3000',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($posts3),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl3);
        curl_close($curl3);

        // Ustadz Ragil
        $posts4 = [
            'phone' => '6281395268805',
            'message' => $pesan
        ];
        $curl4 = curl_init();
        curl_setopt_array($curl4, array(
            CURLOPT_URL => 'http://localhost:3000',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($posts4),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl4);
        curl_close($curl4);

        // Satpam
        // Pak Khoir : 6281316288024
        // Pak Eko : 6281253374456
        // Pak Nur : 6282113378830
        $posts5 = [
            'phone' => '6282113378830',
            'message' => $pesan
        ];
        $curl5 = curl_init();
        curl_setopt_array($curl5, array(
            CURLOPT_URL => 'http://localhost:3000',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($posts5),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl5);
        curl_close($curl5);

        // Ustadz Fajri
        $posts6 = [
            'phone' => '6281291982070',
            'message' => $pesan
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
            CURLOPT_POSTFIELDS => json_encode($posts6),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl6);
        curl_close($curl6);

        // Ustadz Fauzan
        $posts7 = [
            'phone' => '6282187651045',
            'message' => $pesan
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
            CURLOPT_POSTFIELDS => json_encode($posts7),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl7);
        curl_close($curl7);

        // Ustadz Faruq
        $posts8 = [
            'phone' => '6282110905080',
            'message' => $pesan
        ];
        $curl8 = curl_init();
        curl_setopt_array($curl8, array(
            CURLOPT_URL => 'http://localhost:3000',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($posts8),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl8);
        curl_close($curl8);

        // Chef Miftah
        $posts9 = [
            'phone' => '6285920143115',
            'message' => $pesan
        ];
        $curl9 = curl_init();
        curl_setopt_array($curl9, array(
            CURLOPT_URL => 'http://localhost:3000',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($posts9),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl9);
        curl_close($curl9);

        // Noval
        $posts10 = [
            'phone' => '6282363541957',
            'message' => $pesan
        ];
        $curl10 = curl_init();
        curl_setopt_array($curl10, array(
            CURLOPT_URL => 'http://localhost:3000',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($posts10),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl10);
        curl_close($curl10);

        // Haziq
        $posts11 = [
            'phone' => '6281335280612',
            'message' => $pesan
        ];
        $curl11 = curl_init();
        curl_setopt_array($curl11, array(
            CURLOPT_URL => 'http://localhost:3000',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($posts11),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl11);
        curl_close($curl11);

        // Elki
        $posts12 = [
            'phone' => '6285279205501',
            'message' => $pesan
        ];
        $curl12 = curl_init();
        curl_setopt_array($curl12, array(
            CURLOPT_URL => 'http://localhost:3000',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($posts12),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl12);
        curl_close($curl12);

        // Jepri
        $posts13 = [
            'phone' => '6285609393302',
            'message' => $pesan
        ];
        $curl13 = curl_init();
        curl_setopt_array($curl13, array(
            CURLOPT_URL => 'http://localhost:3000',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($posts13),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl13);
        curl_close($curl13);

        // Pak Khoir
        $posts14 = [
            'phone' => '6281316288024',
            'message' => $pesan
        ];
        $curl14 = curl_init();
        curl_setopt_array($curl14, array(
            CURLOPT_URL => 'http://localhost:3000',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($posts14),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl14);
        curl_close($curl14);

        // Pak Eko
        $posts15 = [
            'phone' => '6281253374456',
            'message' => $pesan
        ];
        $curl15 = curl_init();
        curl_setopt_array($curl15, array(
            CURLOPT_URL => 'http://localhost:3000',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($posts15),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl15);
        curl_close($curl15);

        // Ustadz Fathur
        $posts16 = [
            'phone' => '62895333091397',
            'message' => $pesan
        ];
        $curl16 = curl_init();
        curl_setopt_array($curl16, array(
            CURLOPT_URL => 'http://localhost:3000',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($posts16),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl16);
        curl_close($curl16);
        return redirect()->back()->with(['success' => 'Licensing confirmation successfully!']);
    }

    public function filter(Request $request)
    {
        $start_date = $request->start_date;
        $menuPost = 'active';

        $posts = Post::whereDate('updated_at', '>=', $start_date)
            ->get();

        return view('pages.posts.index_post', compact('posts', 'menuPost'));
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
            return redirect()->route('admin.index')->with(['succes' => 'Licensing success to delete']);
        }
        return redirect()->route('admin.index')->with(['failed' => 'Licensing failed to delete']);
    }
}

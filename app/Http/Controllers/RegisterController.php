<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuUser = 'active';
        $user = User::get();

        return view('register.index', compact('user', 'menuUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register.form_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // PROSES VALIDASI DATA
         $request->validate(
            [
                'name' => 'required',
                'role'=> 'required',
                'email'=> 'required',
                'password' => 'required|min:6',
                'jurusan' => 'required',
                'telp' => 'required',
                'nim' => 'required',
            ],
            [
                'name.required' => 'Kolom Nama harus diisi',
                'role.required' => 'Kolom Role harus diisi',
                'email.required' => 'Kolom Email harus diisi',
                'password' => [
                    'required' => 'Kolom Password harus diisi',
                    'min' => 'Kolom Password minimal 6 karakter',
                ],
                'jurusan.required' => 'Kolom Jurusan harus diisi',
                'telp.required' => 'Kolom No Telpon harus diisi',
                'nim.required' => 'Kolom NIM harus diisi',
            ]
        );

        DB::table('users')->insert(
            [
                'name'=>$request->name,
                'role'=>$request->role,
                'email'=>$request->email,
                'password'=> Hash::make($request->password),
                'jurusan' => $request->jurusan,
                'telp' => $request->telp,
                'nim' => $request->nim,
            ]
        );

        return redirect('/user')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = User::where('id', '=',$id)->get();
        return view('register.form_edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // PROSES VALIDASI DATA
        $request->validate(
            [
                'name' => 'required',
                'role'=> 'required',
                'email'=> 'required',
                'password' => 'required|min:6',
                'jurusan' => 'required',
                'telp' => 'required',
                'nim' => 'required',
            ],
            [
                'name.required' => 'Kolom Nama harus diisi',
                'role.required' => 'Kolom Role harus diisi',
                'email.required' => 'Kolom Email harus diisi',
                'password' => [
                    'required' => 'Kolom Password harus diisi',
                    'min' => 'Kolom Password minimal 6 karakter',
                ],
                'jurusan.required' => 'Kolom Jurusan harus diisi',
                'telp.required' => 'Kolom No Telpon harus diisi',
                'nim.required' => 'Kolom NIM harus diisi',
            ]
        );

        DB::table('users')->where('id', '=', $id)->update(
            [
                'name'=>$request->name,
                'role'=>$request->role,
                'email'=>$request->email,
                'password'=> Hash::make($request->password),
                'jurusan' => $request->jurusan,
                'telp' => $request->telp,
                'nim' => $request->nim,
            ]
        );

        return redirect('/user')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('user')->with('success','Data berhasil dihapus');
    }
}

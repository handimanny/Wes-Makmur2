<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Postingan;
use App\Models\User;
use Illuminate\Http\Request;

class PostinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan semu data postingan
        $data = Postingan::all();
        return view('/postingan/postingan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menuju form buat postingan
        $kategori = Kategori::all();
        $user = User::all();
        $data = Postingan::all();
        return view('/postingan/create', compact('data', 'kategori','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //buat postingan baru
        // dd($request);
        $validator = $request->validate([
            'judul' => 'required|string',
            'isi' => 'required|string',
            'tanggalDibuat' => 'required|string',
            'user_id' => 'required|string',
            'kategori_id' => 'required|string',
            'status' => 'string'
          ]);
          Postingan::create($validator);
          return redirect('/postingan')->with('success', 'berhasil buat postingan');
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
        // menuju form edit
        $data = Postingan::findOrFail($id);
        $kategori = Kategori::all();
        $user = User::all();
        return view('/postingan/edit', compact('data','kategori', 'user'));
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
        //perbarui postingan
        $data = Postingan::findOrFail($id);
        $validator = $request->validate([
            'judul' => 'required|string',
            'isi' => 'required|string',
            'tanggalDibuat' => 'required|string',
            'kategori_id' => 'required|string',
            'user_id' => 'required|string',
            'status' => 'string',
        ]);
        $data->update($validator);
        return redirect('/postingan')->with('success', 'berhasil edit postingan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hapus postingan
        $data = Postingan::findOrFail($id);
        $data->delete();
        return redirect('/postingan')->with('error', 'berhasil hapus postingan');
    }
}

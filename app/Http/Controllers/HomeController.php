<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Lihat;
use App\Models\Postingan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //tampilan artikel di halaman
        $kategori = Kategori::all();
        $lihat = Lihat::all();
        $data = Postingan::where('status', 'tampil')->get();
        return view('home', compact('data','kategori','lihat'));
    }

    public function kategori($id)
    {
        //kategori filter
        $data = Postingan::where('status', 'tampil')->where('kategori_id', $id)->get();
        $kategori = Kategori::all();
        return view('home', compact('data', 'kategori'));
    }

    public function halaman($id)
    {
        $data = Postingan::findOrFail($id);
        $postingan = Postingan::all(); //untuk @foreach ($postingan as $file), gak guna tapi
        // $kategori = Kategori::all();
        // $user = User::all();
        // $lihat = Lihat::all();
        $produk = Produk::select('*')->where('kategori_id', '=', $data->kategori_id)->where('status', 'tampil')->get();
        
        if (Lihat::where('postingan_id', $id)->where('user_id', Auth::user()->id)->exists()) {
            return view('halaman', compact('data','produk','postingan'));
        }else {
            Lihat::create([
                'postingan_id' => $id,
                'user_id' => Auth::user()->id,
            ]);
            return view('halaman', compact('data','produk','postingan'));
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Postingan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

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
        $data = Postingan::where('status', 'tampil')->get();
        return view('home', compact('data'));
    }

    public function halaman($id)
    {
        $data = Postingan::findOrFail($id);
        $kategori = Kategori::all();
        $user = User::all();
        
        $produk = Produk::select('*')->where('kategori_id', '=', $data->kategori_id)->where('status', 'tampil')->get();

        return view('halaman', compact('data','kategori','user','produk'));
    }
}

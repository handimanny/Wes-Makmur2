<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Lihat;
use App\Models\Postingan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $data = Postingan::where('status', 'tampil')->get();
        return view('home', compact('data','kategori'));
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
        // $kategori = Kategori::all();
        // $user = User::all();
        $data = Postingan::findOrFail($id);
        $lihat = Lihat::select('lihats')->where('postingan_id', $data->id)->count();
        $produk = Produk::select('*')->where('kategori_id', '=', $data->kategori_id)->where('status', 'tampil')->get();
        
        if (Lihat::where('postingan_id', $id)->where('user_id', Auth::user()->id)->exists()) {
            return view('halaman', compact('data','produk','lihat'));
        }else {
            Lihat::create([
                'postingan_id' => $id,
                'user_id' => Auth::user()->id,
            ]);
            return view('halaman', compact('data','produk','lihat'));
        }
    }
}

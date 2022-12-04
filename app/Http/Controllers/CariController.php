<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Postingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CariController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $nw = new Filter($request->kategori_id, Auth::user()->id);
        $dt = [
            'cate' => $nw->sortCategory(),
            'rb' => $nw->sortRead(),
        ];
        dd($dt);
        $kategori = Kategori::all();
        if ($request->uid) {
            if ($nw->sortRead() == 'Sudah Dibaca') {
                $data = $nw->sortCategory();
                return view('home', compact('data', 'kategori', 'dt'));
            }
        }else {
            $data = $nw->sortCategory();
            return view('home', compact('data', 'kategori'));
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

class Filter {
    public function __construct($kategori = '', $user_id)
    {
        $this->cate = $kategori;
        $this->uid = $user_id;
    }

    public function sortCategory()
    {
        // dd($this->cate);
        $ktgr = Kategori::all();
        if ($this->cate == '') {
            return $data = Postingan::where('status', 'tampil')->get();
        }else {
            $data = Postingan::where('status', 'tampil')->where('kategori_id', $this->cate)->get();
            return $data;
        }
        // foreach ($ktgr as $k) {
            //     if ($k->id == $this->cate) {
                //         return $this->cate;
                //     }
                // }
                // return $this->cate;
        // $data = Postingan::where('tampil', 1)->where('kategori_id', $id)->get();
    }

    public function sortRead()
    {
        // dd($this->uid);
        if (DB::table('lihats')->where('user_id', $this->uid)->exists()) {
            return "Sudah Dibaca";
        }else {
            return "Belum Dibaca";
        }
    }
}
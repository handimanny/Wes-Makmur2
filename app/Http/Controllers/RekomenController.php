<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekomenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menuju halaman rekomendasi
        return view('rekomen');
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
        $keluhan = $request->keluhan;
    
        $rekom = new Penggunaan($keluhan, $request->tahun);
    
        $data = [
            'keluhannya' => $keluhan,
            'khasiatnya' => $rekom->khasiat(),
            'umurnya' => $rekom->umur(),
            'jamunya' => $rekom->namaJamu(),
            'sarannya' => $rekom->saran(),
        ];
    
        return view('rekomen', compact('data'));
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

class Jamu
{
    public function __construct($keluhan, $tahun)
    {
        $this->keluhan = $keluhan;
        $this->tahunLahir = date('Y', strtotime($tahun));
    }

    public function umur(){
        return date('Y')-$this->tahunLahir;
    }
    
    public function namaJamu()
    {
        if($this->keluhan == 'Keseleo dan kurang nafsu makan'){
            return 'Beras Kencur';
        }else if($this->keluhan=='Pegal-pegal'){
            return 'Kunyit Asam';
        }else if($this->keluhan=='Darah tinggi dan gula darah'){
            return 'Brotowali';
        }else if($this->keluhan=='Kram perut dan masuk angin'){
            return 'Temulawak';
        }else{
            return 'Tidak ditemukan jamu';
        }
    }

    public function khasiat()
    {
        return 'Mengobati / Meredakan '.$this->keluhan;
        // if ($this->namaJamu() == 'Beras Kencur') {
        //     return "Meredakan keseleo dan menambah nafsu makan.";
        // }elseif ($this->namaJamu() == 'Kunyit Asam') {
        //     return "Meredakan pegal-pegal.";
        // }elseif ($this->namaJamu() == 'Brotowali') {
        //     return "Menurunkan kadar gula darah.";
        // }elseif ($this->namaJamu() == 'Temulawak') {
        //     return "Meredakan kram perut.";
        // }
    }

}

class Penggunaan extends Jamu
{
    public function saran(){// method saran
        if($this->umur()<=10){
            $status = ' 1x';
        }else{
            $status = ' 2x';
        }

        if($this->namaJamu() == 'Beras Kencur' && $this->keluhan == 'Keseleo dan kurang nafsu makan'){
            $penggunaan = 'Dioleskan';
        }else{
            $penggunaan = 'Dikonsumsi';
        }

        return $penggunaan.' '. $status;

    }
}
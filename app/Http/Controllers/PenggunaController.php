<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //semua data pengguna
        $data = User::all();
        return view('/pengguna/pengguna', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = User::all();
        return view('/pengguna/create', compact('data'));
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
        // dd($request);

        $request->validate([
            'name' => 'required',
            'email' => 'required|string',
            'password' => 'required',
            'role' => 'string',
        ]);

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->role = $request->role;
        $data->save();

        return redirect('/pengguna')->with('success', 'berhasil buat pengguna');
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
        //menuju form edit pengguna
        $data = User::findOrFail($id);
        return view('pengguna/edit', compact('data'));
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
        //perbarui data pengguna
        $data = User::findOrFail($id);
        
        
        // if ($request->password)
        // $data->password = Hash::make($request->password);        
        // $data->save();

        // $data->update([
        // 'name' => $request->name,
        // 'email' => $request->email,
        // 'password' => Hash::make($request->password),
        // 'role' => $request->role,
        // ]);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        $data->name = $request->name;
        $data->email = $request->email;
        if ($request->password)
            $data->password = Hash::make($request->password);
        $data->role = $request->role;
        $data->update();

        return redirect('/pengguna')->with('success', 'berhasil perbarui pengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hapus pengguna
        $data = User::findOrFail($id);
        $data->delete();
        return redirect('/pengguna')->with('error', 'berhasil hapus pengguna');
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use App\Models\Postingan;
use App\Models\Produk;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin@mail.com'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'editor',
            'email' => 'editor@mail.com',
            'password' => Hash::make('editor@mail.com'),
            'role' => 'editor',
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => Hash::make('user@mail.com'),
            'role' => 'user',
        ]);

        Kategori::create([
            'nama_kategori'=> 'bubuk',
            'descKategori'=> 'bubuk adalah bubuk',
        ]);
        Kategori::create([
            'nama_kategori'=> 'cair',
            'descKategori'=> 'cair adalah cair',
        ]);
        
        Postingan::create([
            'judul'=> 'jamu cair',
            'isi'=> 'isi jamu cair Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'tanggalDibuat'=> Carbon::parse('2021-12-21'),
            'user_id'=> 1,
            'kategori_id'=> 2,
            'status'=> 'tampil',
        ]);
        Postingan::create([
            'judul'=> 'jamu bubuk',
            'isi'=> 'isi jamu bubuk Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'tanggalDibuat'=> Carbon::parse(),
            'user_id'=> 1,
            'kategori_id'=> 1,
            'status'=> 'tampil',
        ]);
        Postingan::create([
            'judul'=> 'jamu bubuk dua',
            'isi'=> 'isi jamu bubuk dia Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'tanggalDibuat'=> Carbon::parse(),
            'user_id'=> 2,
            'kategori_id'=> 1,
        ]);

        Produk::create([
            'namaProduk'=> 'jamu bubuk',
            'foto'=> 'img/pPr0eSWln3gWtnrN3S39OBWUIT52JIj9hA8e2g9w.png',
            'harga'=> 20000,
            'descProduk'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'kategori_id'=> 1,
            'status'=> 'tampil',
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //untuk relasi kategori ke postingan
    protected $table = 'kategoris';
    
    public function postingan()
    {
        return $this->hasMany(Postingan::class);
    }

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
    
}

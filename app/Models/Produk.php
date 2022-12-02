<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //untuk relasi ke kategori
    protected $table = 'produks';
  
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //untuk relasi ke kategori
    protected $table = 'postingans';
  
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

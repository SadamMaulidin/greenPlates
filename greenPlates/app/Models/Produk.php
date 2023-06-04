<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';
    // $stater = Produk::where('id_kategori', 1)->get();
    public function pesanan_detail()
    {
        return $this->hasMany('App\Models\PesananDetail', 'id_pesanan', 'id');
    }
}

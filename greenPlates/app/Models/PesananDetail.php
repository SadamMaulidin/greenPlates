<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;
    public function produk()
    {
        return $this->beLongsTo('App\Models\Produk', 'id_produk', 'id');
    }

    public function pesanan()
    {
        return $this->beLongsTo('App\Models\Pesanan', 'id_pesanan', 'id');
    }
}

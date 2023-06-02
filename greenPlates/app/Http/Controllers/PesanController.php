<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function pesanan($id)
{
    // Mengambil data produk berdasarkan ID
    $produk = Produk::findOrFail($id);

    // Mengirim data produk ke tampilan pesanan.blade.php
    return view('pesanan', compact('produk'));
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $data_produk=Produk::all();
        $starter=Produk::where('id_kategori', 1)->get();
        $breakfast=Produk::where('id_kategori',2)->get();
        $lunch=Produk::where('id_kategori',3)->get();
        $dinner=Produk::where('id_kategori',4)->get();
        // return $data_produk; 
        return view('menu', compact('data_produk', 'starter', 'breakfast', 'lunch', 'dinner'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform the search query using the $query parameter
        $results = Product::where('nama_produk', 'like', '%' . $query . '%')->get();

        return view('menu', compact('results'));
    }
}

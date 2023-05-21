<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $data_produk=Produk::all();
        // return $data_produk; 
        return view('menu', compact('data_produk'));
    }

    public function starter()
    {
        $starter=Produk::where('id_kategori', 1)->get();
        // return $data_produk; 
        return view('menu', compact('starter'));
    }

    public function breakfast()
    {
        $breakfast=Produk::where('id_kategori',2)->get();
        // return $data_produk; 
        return view('menu', compact('breakfast'));
    }
    
    public function lunch()
    {
        $lunch=Produk::where('id_kategori',3)->get();
        // return $data_produk; 
        return view('menu', compact('lunch'));
    }
    
    public function dinner()
    {
        $dinner=Produk::where('id_kategori',4)->get();
        // return $data_produk; 
        return view('menu', compact('dinner'));
    }
}

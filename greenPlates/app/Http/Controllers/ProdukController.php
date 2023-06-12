<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\PesananDetail;
// use Auth;
use Carbon\Carbon;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Auth;

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

    public function pesanan(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
    
        return view('pesanan', compact('produk'));
    }
    
    public function pesan(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $tanggal = Carbon::now();

        // validasi stok
        if($request->jumlah_pesan > $produk->stok)
        {
            return redirect('pesan/.$id');
        }

        // cek validasi
        $cek_pesanan = Pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();

        // simpan database pesanan
        if(empty($cek_pesanan))
        {
            $pesanan = new Pesanan;
            $pesanan->id_user = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(1000,9999);
            $pesanan->save();
        }
        
        // simpan ke db pesanan detail
        $pesanan_baru = Pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();

        // cek pesanan detail
        $cek_pesanan_detail = PesananDetail::where('id_produk', $produk->id)->where('id_pesanan', $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail))
        {
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->id_produk = $produk->id;
            $pesanan_detail->id_pesanan = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $produk->harga*$request->jumlah_pesan;
            $pesanan_detail->save();
        }
        else
        {
            $cek_pesanan_detail = PesananDetail::where('id_produk', $produk->id)->where('id_pesanan', $pesanan_baru->id)->first();
            $pesanan_detail = PesananDetail::find($cek_pesanan_detail->id); // Menambahkan baris ini untuk mendefinisikan variabel $pesanan_detail
            $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesan;
            
            // harga sekarang
            $harga_pesanan_detail_baru = $produk->harga*$request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        // jumlah total
        $pesanan = Pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga+$produk->harga*$request->jumlah_pesan;
        $pesanan->update();

        return redirect('/menu');
    }

    public function co()
    {
        $pesanan = Pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();
        $pesanan_detail = null; // Inisialisasi $pesanan_detail sebagai null

        if (!empty($pesanan)) 
        {
            $pesanan_detail = PesananDetail::where('id_pesanan', $pesanan->id)->get();
        }

        return view('co', compact('pesanan', 'pesanan_detail'));
    }

    public function delete($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->id_pesanan)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();
        return redirect('/co');
    }

    public function konfirmasi()
    {
        $pesanan = Pesanan::where('id_user', Auth::user()->id)->where('status',0)->first();
        $id_pesanan = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_detail = PesananDetail::where('id_pesanan', $id_pesanan)->get();
        foreach($pesanan_detail as $pesanan_detail)
        {
            $produk = Produk::where('id', $pesanan_detail->id_produk)->first();
            $produk->stok = $produk->stok-$pesanan_detail->jumlah;
            $produk->update();
        }

        return redirect('history/'.$id_pesanan);
    }

    public function history()
    {
        $pesanans = Pesanan::where('id_user', Auth::user()->id)->where('status','!=',0)->get();

        return view('history', compact('pesanans'));
    }

    public function detail($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_detail = PesananDetail::where('id_pesanan', $pesanan->id)->get();
        

        return view('detail', compact('pesanan', 'pesanan_detail'));
    }
}


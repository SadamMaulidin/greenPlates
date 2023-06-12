<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Auth;
use GuzzleHttp\Handler\Proxy;
use App\Models\PesananDetail;
use App\Models\Pesanan;

class AdminController extends Controller
{
    public function Index()
    {
        return view('admin.admin-login');
    }

    public function Dashboard()
    {
        return view('admin.admin-dashboard');
    }

    public function Login(Request $request)
    {
        // dd($request->all());

        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('admin.dashboard')->with('error', 'Admin Login Successfully');
        }else {
            return back()->with('error', 'invalid email or password');
        }
    }

    public function ListOrder()
    {
        $order = Pesanan::All();
        $unconfirmed = Pesanan::where('status', 1)->get();
        $process = Pesanan::where('status', 2)->get();
        $shipping = Pesanan::where('status', 3)->get();
        return view('admin.admin-dashboard', compact('order', 'unconfirmed', 'process', 'shipping'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function konfirmasiOrder(Request $request, $id)
    {
        // $pesanan = Pesanan::all();'
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = 2;
        $pesanan->update();

        // $pesanan_detail = PesananDetail::where('id_pesanan', $id_pesanan)->get();
        // foreach($pesanan_detail as $pesanan_detail)
        // {
        //     $produk = Produk::where('id', $pesanan_detail->id_produk)->first();
        //     $produk->stok = $produk->stok-$pesanan_detail->jumlah;
        //     $produk->update();
        // }

        return redirect('/admin/dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orderPesananController extends Controller
{

    public function index(Request $request)
    {
        // $customers =  DB::table('pe_order')
        // ->leftJoin('users', 'users.email', '=', 'pe_order.email_user')
        // ->select('pe_order.*', 'users.nama')
        // ->where('pe_order.email_toko', '=', auth()->user()->email)
        // ->get();
        // return view("pesanan.index", compact('customers'));
        $menus = DB::table('pe_menu')
        ->where('pe_menu.toko_id', '=', auth()->user()->email)
        ->get();    
        return view("order.index", compact('menus'));
    }

    public function submitNota(Request $request)
    {
        
        // $orders = [
        //     'namaMenu' => $request->input('namaMenu'),
        //     'harga' => $request->input('harga'),
        //     'fotoMenu' => $request->input('fotoMenu'),
        //     'quantity' => $request->input('quantity'),
            
        // ];
        // dd($orders);
        return redirect("mahasiswa/order/notaPesanan");
        // return redirect("mahasiswa.notaPesanan.index");
    }


}

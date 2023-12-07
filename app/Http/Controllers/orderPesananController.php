<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class orderPesananController extends Controller
{

    public function index(Request $request)
    {

        return view("order.index");
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

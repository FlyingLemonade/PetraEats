<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class notaPesananController extends Controller
{

    public function index(Request $request)
    {
        $jsonString = $request->input('sendOBJ');
        $obj = json_decode($jsonString, true);

        $shoppingCart = $obj['shoppingCart'];
        $totalHarga = $obj['totalHarga'];
        $idToko = $obj['idToko'];
        $orders = [];

        foreach ($shoppingCart as $menu) {
            $orders[] = [
                'idMenu' => $menu['idMenu'],
                'namaMenu' => $menu['namaMenu'],
                'harga' => $menu['harga'],
                'fotoMenu' => $menu['fotoMenu'],
                'quantity' => $menu['quantity'],
            ];
        }

        $dataToko = DB::table('pe_toko')
            ->where('pe_toko.toko_id', '=', $idToko)
            ->select('pe_toko.*')
            ->get();
        return view('mahasiswa.notaPesanan.index')->with(['orders' => $orders, 'totalHarga' => $totalHarga, 'dataToko' => $dataToko]);
    }

    public function submitPembayaran(Request $request)
    {
    }
}

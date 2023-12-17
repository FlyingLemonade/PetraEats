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
        $toMidtrans = [];
        foreach ($shoppingCart as $menu) {
            $orders[] = [
                'idMenu' => $menu['idMenu'],
                'namaMenu' => $menu['namaMenu'],
                'harga' => $menu['harga'],
                'fotoMenu' => $menu['fotoMenu'],
                'quantity' => $menu['quantity'],
            ];

            $toMidtrans[] = [
                'id' => $menu['idMenu'],
                'name' => $menu['namaMenu'],
                'quantity' => $menu['quantity'],
                'price' => $menu['harga'],
                'subtotal' => $menu['totalPrice'],
            ];
        }

        $dataToko = DB::table('pe_toko')
            ->where('pe_toko.toko_id', '=', $idToko)
            ->select('pe_toko.*')
            ->first();
        $namaUser = DB::table('users')
            ->where('users.email', '=', auth()->user()->email)
            ->select("users.nama")
            ->first();

        /*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
        composer require midtrans/midtrans-php
                                    
        Alternatively, if you are not using **Composer**, you can download midtrans-php library 
        (https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require 
        the file manually.   

        require_once dirname(__FILE__) . '/pathofproject/Midtrans.php';*/

        //SAMPLE REQUEST START HERE

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' =>  $totalHarga,
            ),
            'item_details' => $toMidtrans,
            'customer_details' => array(
                'name' =>  $namaUser,
                'phone' => '0192838',
                'email' => auth()->user()->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);


        return view('mahasiswa.notaPesanan.index')
            ->with([
                'orders' => $orders,
                'totalHarga' => $totalHarga,
                'dataToko' => $dataToko,
                'snapToken' => $snapToken
            ]);
    }
}

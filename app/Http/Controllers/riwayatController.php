<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class riwayatController extends Controller
{

    public function riwayatMahasiswa(Request $request)
    {
        $orders =  DB::table('pe_order')
            ->leftJoin('users', 'users.email', '=', 'pe_order.email_user')
            ->leftJoin('pe_toko', 'pe_order.email_toko', '=', 'pe_toko.toko_id')
            ->select('pe_order.*', 'pe_toko.nama_toko', 'pe_toko.picture')
            ->where('pe_order.email_user', '=', auth()->user()->email)
            ->get();
        return view("riwayat.index", compact("orders"));
    }    

    public function riwayatKantin(Request $request)
    {
        $customers =  DB::table('pe_order')
            ->leftJoin('users', 'users.email', '=', 'pe_order.email_user')
            ->select('pe_order.*', 'users.nama', 'users.picture')
            ->where('pe_order.email_toko', '=', auth()->user()->email)
            ->get();
        return view("riwayat.index", compact("customers"));
    }   
}

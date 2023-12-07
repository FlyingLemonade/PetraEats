<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pesananMahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $orders =  DB::table('pe_order')
            ->leftJoin('users', 'users.email', '=', 'pe_order.email_user')
            ->leftJoin('pe_toko', 'pe_order.email_toko', '=', 'pe_toko.toko_id')
            ->select('pe_order.*', 'pe_toko.nama_toko')
            ->where('pe_order.email_user', '=', auth()->user()->email)
            ->get();
        return  view("pesanan.index", compact("orders"));
    }
}

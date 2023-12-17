<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class getController extends Controller
{
    public function getToko($tokoID)
    {
        $status = DB::table('pe_toko')
            ->where('pe_toko.toko_id', '=', $tokoID)
            ->select('pe_toko.tutup')
            ->get();
        return response()->json($status);
    }
    public function getOrder($orderID)
    {
        $orderID = (int)$orderID;
        $data = DB::table('pe_order')
            ->where('pe_order.order_id', '=', $orderID)
            ->leftJoin('pe_detail_order', 'pe_order.order_id', '=', 'pe_detail_order.order_id')
            ->leftJoin('pe_menu', 'pe_detail_order.menu_id', '=', 'pe_menu.menu_id')
            ->select('pe_order.*', 'pe_menu.nama_menu', 'pe_detail_order.jumlah_pesanan', 'pe_menu.toko_id')
            ->get();

        return response()->json($data);
    }

    public function getPembeli($email)
    {
        $pembeli = DB::table('users')
            ->where('users.email', '=', $email)
            ->select('users.*')
            ->first();
        return response()->json($pembeli);
    }
}

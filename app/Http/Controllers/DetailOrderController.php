<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DetailOrderController extends Controller
{
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
}

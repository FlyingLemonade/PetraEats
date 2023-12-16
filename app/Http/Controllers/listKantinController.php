<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class listKantinController extends Controller
{


    function index(Request $request)
    {

        $canteenID = (int)$request->input('canteenID');

        $data = DB::table('pe_toko')
            ->leftJoin('pe_kantin', 'pe_toko.kantin_id', '=', 'pe_kantin.kantin_id')
            ->where('pe_toko.kantin_id', '=', $canteenID)
            ->select('pe_toko.*', 'pe_kantin.*')
            ->get();

        $recommends = DB::table('pe_menu')
            ->leftJoin("pe_toko", "pe_toko.toko_id", "=", "pe_menu.toko_id")
            ->where("pe_toko.kantin_id", "=", $canteenID)
            ->select('pe_menu.*', 'pe_toko.kantin_id')
            ->get();

        return view("listkantin.index")->with(["canteens" => $data, "recommends" => $recommends]);
    }
}

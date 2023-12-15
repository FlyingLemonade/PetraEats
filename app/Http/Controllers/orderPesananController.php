<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orderPesananController extends Controller
{

    public function index(Request $request)
    {

        $menus = DB::table('pe_menu')
            ->where('pe_menu.toko_id', '=', auth()->user()->email)
            ->get();

        $status = DB::table('pe_toko')
            ->where('pe_toko.toko_id', '=', auth()->user()->email)
            ->select('pe_toko.tutup')
            ->get();
        return view("order.index", compact('menus', 'status'));
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
    public function addMenu(Request $request)
    {

        $request->validate([
            'namaMenuBaru' => 'required',
            'deskripsiBaru' => 'required',
            'hargaBaru' => 'required|numeric',
            'fotoMenuBaru' => 'required'
        ]);

        // Retrieve the form data
        $namaMenu = $request->input('namaMenuBaru');
        $deskripsi = $request->input('deskripsiBaru');
        $harga = $request->input('hargaBaru');
        $kantinId = DB::table('pe_toko')->where('toko_id', auth()->user()->email)->value('kantin_id');

        // Insert data into the pe_menu table
        $menuId = DB::table('pe_menu')->insertGetId([
            'nama_menu' => $namaMenu,
            'deskripsi' => $deskripsi,
            'harga' => $harga,
            'toko_id' => auth()->user()->email,
            'kantin_id' => $kantinId,
        ]);

        if ($menuId) {
            // If the insertion is successful
            return redirect('kantin/order');
        }
    }
    public function toOrder(Request $request)
    {
        $tokoID = $request->input('tokoID');
        $menus = DB::table('pe_menu')
            ->leftJoin('pe_toko', 'pe_menu.toko_id', '=', 'pe_toko.toko_id')
            ->where('pe_menu.toko_id', '=', $tokoID)
            ->select('pe_menu.*', 'pe_toko.kantin_id')
            ->get();

        return view("order.index", compact('menus'));
    }
    public function updateStatus(Request $request)
    {
        $status = $request->input('value');
        $affected = DB::table('pe_toko')
            ->where('pe_toko.toko_id', '=', auth()->user()->email)
            ->update(['tutup' => $status]);
        return response()->json(['status' => 'success']);
    }
}

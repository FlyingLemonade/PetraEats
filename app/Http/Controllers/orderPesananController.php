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
            ->leftJoin('pe_kantin', 'pe_toko.kantin_id', '=', 'pe_kantin.kantin_id')
            ->select('pe_toko.*', 'pe_kantin.*')
            ->get();


        return view("order.index", with(['menus' => $menus, 'status' => $status]));
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
            ->leftJoin('pe_kantin', 'pe_kantin.kantin_id', '=', 'pe_toko.kantin_id')
            ->where('pe_menu.toko_id', '=', $tokoID)
            ->select('pe_menu.*', 'pe_toko.kantin_id', 'pe_toko.nama_toko', 'pe_kantin.nama_kantin')
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

    public function deleteMenu(Request $request)
    {
        $menu_id = $request->input('menu_id');

        DB::table('pe_menu')->where('menu_id', $menu_id)->delete();

        return response()->json(['status' => 'success']);
    }

    public function editMenu(Request $request)
    {
        $menu_id = $request->input('menu_id');

        $namaMenu = $request->input('namaMenuEdit');
        $deskripsi = $request->input('deskripsiEdit');
        $harga = $request->input('hargaEdit');

        // Update the data in the pe_menu table
        DB::table('pe_menu')->where('menu_id', $menu_id)->update([
            'nama_menu' => $namaMenu,
            'deskripsi' => $deskripsi,
            'harga' => $harga,

        ]);

        return response()->json(['status' => 'success']);
    }

    public function getToko($tokoID)
    {
        $status = DB::table('pe_toko')
            ->where('pe_toko.toko_id', '=', $tokoID)
            ->select('pe_toko.tutup')
            ->get();
        return response()->json($status);
    }
}

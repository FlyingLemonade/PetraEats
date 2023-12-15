<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class orderPesananController extends Controller
{

    public function index(Request $request)
    {
        if (auth()->user()->status_user == 1) {
            //Nunggu BACKEND om
            $menus = DB::table('pe_menu')
            ->where('pe_menu.toko_id', '=', auth()->user()->email)
            ->get();

            return view("order.index", compact('menus'));
        } else if (auth()->user()->status_user == 2) {
            $query = DB::table('pe_menu')->where('pe_menu.toko_id', '=', auth()->user()->email);
            $kantinId = DB::table('pe_toko')->where('toko_id', auth()->user()->email)->value('kantin_id');
            $query->join('pe_toko', 'pe_menu.toko_id', '=', 'pe_toko.toko_id')
                ->where('pe_toko.kantin_id', '=', $kantinId);

            $menus = $query->get();
            return view("order.index", compact('menus'));
        }
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
        if ($request->isMethod('post')) {
            $request->validate([
                'namaMenuBaru' => 'required',
                'deskripsiBaru' => 'required',
                'hargaBaru' => 'required|numeric',
                'fotoBaru' => 'required'
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
                return response()->json(['status' => 'success', 'message' => 'Menu added successfully']);
            } else {
                // If the insertion fails
                return response()->json(['status' => 'error', 'message' => 'Data ada yang kosong']);
            }
        }
    }
}

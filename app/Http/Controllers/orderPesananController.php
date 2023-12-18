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
            ->select('pe_menu.*', 'pe_menu.picture AS menu_picture')
            ->get();

        $status = DB::table('pe_toko')
            ->where('pe_toko.toko_id', '=', auth()->user()->email)
            ->leftJoin('pe_kantin', 'pe_toko.kantin_id', '=', 'pe_kantin.kantin_id')
            ->select('pe_toko.*', 'pe_kantin.*')
            ->get();
        return view('order.index', with(['menus' => $menus, 'status' => $status]));
    }

    public function submitNota(Request $request)
    {
        $orders = [
            'idMenu' => $request->input('idMenu'),
            'namaMenu' => $request->input('namaMenu'),
            'harga' => $request->input('harga'),
            'fotoMenu' => $request->input('fotoMenu'),
            'quantity' => $request->input('quantity'),

        ];
        session(['orders' => $orders]);

        return redirect()->route('notaPesanan');
    }

    public function toOrder(Request $request)
    {
        $tokoID = $request->input('tokoID');
        $menus = DB::table('pe_menu')
            ->leftJoin('pe_toko', 'pe_menu.toko_id', '=', 'pe_toko.toko_id')
            ->leftJoin('pe_kantin', 'pe_kantin.kantin_id', '=', 'pe_toko.kantin_id')
            ->where('pe_menu.toko_id', '=', $tokoID)
            ->select('pe_menu.*', 'pe_menu.picture AS menu_picture', 'pe_toko.*', 'pe_kantin.nama_kantin')
            ->get();

        return view('order.index', compact('menus'));
    }

    public function addMenu(Request $request)
    {
        // Validate the request
        $request->validate([
            'namaMenuBaru' => 'required',
            'deskripsiBaru' => 'required',
            'hargaBaru' => 'required|numeric',
            'fotoMenuBaru' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload
        $fileName = time() . '.' . $request->file('fotoMenuBaru')->getClientOriginalExtension();

        // Move the file to public/assets/foods directory
        $request->file('fotoMenuBaru')->move(public_path('assets/foods'), $fileName);

        // Get toko_id and kantin_id
        $toko_id = auth()->user()->email;
        $kantin_id = DB::table('pe_toko')->where('toko_id', $toko_id)->value('kantin_id');

        // Insert data using raw SQL query
        DB::table('pe_menu')->insert([
            'nama_menu' => $request->namaMenuBaru,
            'deskripsi' => $request->deskripsiBaru,
            'harga' => $request->hargaBaru,
            'toko_id' => $toko_id,
            'kantin_id' => $kantin_id,
            'picture' => $fileName,
        ]);

        // Return a response (you can customize the response format)
        return response()->json(['message' => 'Menu added successfully']);
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
        $request->validate([
            'menu_id' => 'required',
            'namaMenuEdit' => 'required',
            'deskripsiEdit' => 'required',
            'hargaEdit' => 'numeric',
            'fotoMenuEdit' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $menu_id = $request->menu_id;

        if ($request->hasFile('fotoMenuEdit')) {
            // Handle file upload
            $fileName = time() . '.' . $request->file('fotoMenuEdit')->getClientOriginalExtension();
            // Move the file to public/assets/foods directory
            $request->file('fotoMenuEdit')->move(public_path('assets/foods'), $fileName);

            DB::table('pe_menu')->where('menu_id', $menu_id)->update([
                'nama_menu' => $request->namaMenuEdit,
                'deskripsi' => $request->deskripsiEdit,
                'harga' => $request->hargaEdit,
                'picture' => $fileName
            ]);
        } else {
            DB::table('pe_menu')->where('menu_id', $menu_id)->update([
                'nama_menu' => $request->namaMenuEdit,
                'deskripsi' => $request->deskripsiEdit,
                'harga' => $request->hargaEdit,
            ]);
        }

        return response()->json(['message' => 'Menu updated successfully']);
    }
}

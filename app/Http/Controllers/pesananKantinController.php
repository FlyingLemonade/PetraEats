<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class pesananKantinController extends Controller
{

    public function index(Request $request)
    {

        $customers =  DB::table('pe_order')
            ->leftJoin('users', 'users.email', '=', 'pe_order.email_user')
            ->select('pe_order.*', 'users.nama')
            ->where('pe_order.email_toko', '=', auth()->user()->email)
            ->get();
        return view("pesanan.index", compact('customers'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}

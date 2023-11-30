<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class pesananKantinController extends Controller
{

    public function index(Request $request)
    {

        $user = $request->user();
        return view("kantin.pesanan.index");
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}

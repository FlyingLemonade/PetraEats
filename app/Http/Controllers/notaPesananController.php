<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class notaPesananController extends Controller
{

    public function index(Request $request)
    {
        $orders = "lemonade";
        return  view("mahasiswa.notaPesanan.index");
    }
}

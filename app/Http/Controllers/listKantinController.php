<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listKantinController extends Controller
{


    function index()
    {

        return view("listkantin.index");
    }
}

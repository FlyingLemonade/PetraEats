<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view("login.index");
    }

    public function checkLogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Retrieve the user by email

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            session(['user' => $user]);

            if ($user->status_user == 1) {
                return redirect("mahasiswa/");
            } else if ($user->status_user == 2) {

                return redirect("kantin/order");
            }
        }

        // Authentication failed
        Session::flash('error', 'Email or Password incorrect');
        return redirect("/");
    }
}

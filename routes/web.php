<?php

use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\pesananKantinController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::group(["middleware" => "auth"], function () {
    Route::group(["middleware" => "isLogin"], function () {
        // Kantin
        Route::group(
            ["prefix" => "/kantin", "middleware" => "can:kantin"],
            function () {
                Route::get("/pesanan", [pesananKantinController::class, "index"]);
            }
        );

        // Mahasiswa
        Route::group(["prefix" => "/mahasiswa", "middleware" => "can:mahasiswa"], function () {
            Route::get("/", [homeController::class, "index"]);
        });

        Route::get("/logout", [pesananKantinController::class, "logout"]); //Temporary Deleted later
    });
});


Route::middleware('LoggedIn')->group(function () {
    Route::get("/", [loginController::class, "index"])->name("login");
    Route::post("/", [loginController::class, "checkLogin"])->name("checkLogin");
});

Route::get('/getOrder/{orderID}', [DetailOrderController::class, "getOrder"])->middleware("APIBlocker");

/*
To do :

1. Block XSS Scripting and CSRF
2. Saring JSON File kedalam modal
*/
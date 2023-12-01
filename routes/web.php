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

(List Bisa Berubah Seiring Waktu)

1. BackEnd FrontEnd 
	-kantin/pesanan ambil form bukti transfer dan mengirim pesan diterima(backend penting) -> Ryan
	-mahasiswa/pesanan blom di setting dengan html pesanan kantin
	 ket: 1 file html beda output (frontend backend penting)
	-homepage mahasiswa mobile version blom jadi (frontend penting) -> nicolas
	-form pembayaran QR (frontend backend penting) -> daniel
    -mahasiswa/order tempat mahasiswa pesen makan -> nikolas
    -form nota bayar -> Yesto
	-homepage kantin, fitur kantin buka/ tutup
	 ket:dari tampilan kantin buat pesen di mahasiswa tapi ganti output(frontend backend penting)
	

2. Database
	-Gambar QR (penting)->coba pake google form daniel
	-Gambar bukti transfer (penting)
	-Gambar Photo profile (ngga gitu penting)

3. Security
	-Block XSS(kasih token ke API Request di getOrder/{})(ngga gitu penting)
	-Block JSConsoleInject (penting)

4. UI/UX
	-Design Admin blom semua (ngga gitu penting)
	-Design Riwayat pesanan kantin&mahasiswa (penting)
	-Design Kantin baru jadi setengah (penting)

    

*/
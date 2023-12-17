<?php

use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\getController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\listKantinController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\pesananKantinController;
use App\Http\Controllers\pesananMahasiswaController;
use App\Http\Controllers\notaPesananController;
use App\Http\Controllers\orderPesananController;
use App\Http\Controllers\homeControllerKantin;
use App\Http\Controllers\riwayatController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'web' middleware group. Make something great!
|
*/





Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'isLogin'], function () {
        // Kantin
        Route::group(['prefix' => '/kantin', 'middleware' => 'can:kantin'], function () {
            Route::get('/pesanan', [pesananKantinController::class, 'index']);
            Route::get("/riwayat", [riwayatController::class, "riwayatKantin"]);
            Route::group(['prefix' => '/order'], function () {
                Route::get('/', [orderPesananController::class, 'index']);
                Route::group(['middleware' => 'BlockGetMethod'], function () {
                    Route::post('/', [orderPesananController::class, 'addMenu'])->name('addMenu');
                    Route::post('/status', [orderPesananController::class, 'updateStatus']);
                    Route::post('/addMenu', [orderPesananController::class, 'addMenu']);
                    Route::post('/status', [orderPesananController::class, 'updateStatus']);
                    Route::post('/deleteMenu', [orderPesananController::class, 'deleteMenu']);
                    Route::post('/editMenu', [orderPesananController::class, 'editMenu']);
                });
            });
        });

        // Mahasiswa
        Route::group(['prefix' => '/mahasiswa', 'middleware' => 'can:mahasiswa'], function () {
            Route::get('/', [homeController::class, 'index']);
           Route::get("/riwayat", [riwayatController::class, "riwayatMahasiswa"]);
            Route::get('/pesanan', [pesananMahasiswaController::class, 'index']);
            Route::post('/listKantin', [listKantinController::class, 'index'])->name('toCanteen');
            Route::group(['prefix' => '/order'], function () {
                Route::post('/notaPesanan', [notaPesananController::class, 'index']);
                Route::group(['middleware' => 'BlockGetMethod'], function () {
                    Route::post('/', [orderPesananController::class, 'toOrder'])->name('toOrder');
                    Route::post('/nota', [orderPesananController::class, 'submitNota']);
                    Route::post('/submitNota', [notaPesananController::class, 'submitPembayaran'])->name("submitPembayaran");
                });
            });
        });

        Route::get('/logout', [pesananKantinController::class, 'logout']); //Temporary, Deleted later
    });
});


Route::middleware('LoggedIn')->group(function () {
    Route::get('/', [loginController::class, 'index'])->name('login');
    Route::group(['middleware' => 'BlockGetMethod'], function () {
        Route::post('/', [loginController::class, 'checkLogin'])->name('checkLogin');
    });
});

Route::get('/getOrder/{orderID}', [getController::class, 'getOrder'])->middleware('APIBlocker');
Route::get('/getToko/{tokoID}', [getController::class, 'getToko'])->middleware('APIBlocker');
Route::get('/getPembeli/{email}', [getController::class, 'getPembeli'])->middleware('APIBlocker');

/*
To do :

(List Bisa Berubah Seiring Waktu)

1. BackEnd FrontEnd 
	-mahasiswa/pesanan blom di setting dengan html pesanan kantin
	 ket: 1 file html beda output (frontend backend penting)
	-homepage mahasiswa mobile version (frontend penting) -> nicolas
	-form pembayaran QR (backend penting) 
    -mahasiswa/order tempat mahasiswa pesen makan (ajax selesai, kurang isi data ke site nota) (backend penting)-> nikolas
    -form nota bayar (backend penting)
	-homepage kantin, fitur kantin buka/ tutup
	 ket:dari tampilan kantin buat pesen di mahasiswa tapi ganti output(frontend backend penting)
    -list riwayat pesanan (front end back end)

	
2. Database


3. Security


4. UI/UX
	-Design Admin blom semua (ngga gitu penting)
	-Design Riwayat pesanan kantin&mahasiswa (penting)
	-Design Kantin baru jadi setengah (penting)


*/
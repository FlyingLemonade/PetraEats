<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('pe_kantin', function (Blueprint $table) {
            $table->unsignedBigInteger('kantin_id');
            $table->string('nama_kantin');
            $table->primary('kantin_id');
        });
        Schema::create('users', function (Blueprint $table) {
            $table->string('picture');
            $table->string('email');
            $table->string('nama');
            $table->string('no_telepon');
            $table->string('password');
            $table->integer('status_user');
            $table->primary('email');
        });
        Schema::create('pe_toko', function (Blueprint $table) {
            $table->string('picture');
            $table->string('toko_id');
            $table->string('nama_toko');
            $table->unsignedBigInteger('kantin_id');
            $table->integer('tutup');
            $table->primary('toko_id');
            $table->foreign('kantin_id')->references('kantin_id')->on('pe_kantin')->onDelete('cascade');
            $table->foreign('toko_id')->references('email')->on('users')->onDelete('cascade');
        });
        Schema::create('pe_menu', function (Blueprint $table) {
            $table->string('picture');
            $table->unsignedBigInteger('menu_id')->autoIncrement();
            $table->string('nama_menu');
            $table->string('deskripsi');
            $table->double('harga');
            $table->string('toko_id');
            $table->unsignedBigInteger('kantin_id');
            $table->foreign('toko_id')->references('toko_id')->on('pe_toko')->onDelete('cascade');
            $table->foreign('kantin_id')->references('kantin_id')->on('pe_kantin')->onDelete('cascade');
        });
        Schema::create('pe_order', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->autoIncrement();
            $table->dateTime('tanggal');
            // 1 untuk pesanan diterima, 2 pesanan diproses, 3 siap diambil
            $table->integer('status_pesanan');
            $table->double('nominal');
            $table->string('deskripsi')->nullable();
            $table->string('email_user');
            $table->string('email_toko');
            $table->foreign('email_user')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('email_toko')->references('toko_id')->on('pe_toko')->onDelete('cascade');
        });
        Schema::create('pe_detail_order', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('menu_id');
            $table->integer('jumlah_pesanan');
            $table->double('subtotal');
            $table->primary(['order_id', 'menu_id']);
            $table->foreign('order_id')->references('order_id')->on('pe_order');
            $table->foreign('menu_id')->references('menu_id')->on('pe_menu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('pe_kantin');
        // Schema::dropIfExists('pe_order');
        // Schema::dropIfExists('pe_detail_order');
        // Schema::dropIfExists('pe_user');
        // Schema::dropIfExists('pe_menu');
        // Schema::dropIfExists('pe_toko');
    }
};

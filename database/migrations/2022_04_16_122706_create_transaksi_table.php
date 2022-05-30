<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained();
            $table->foreignId('id_produk')->constrained();
            $table->foreignId('id_cabang')->constrained();
            $table->foreignId('id_stok')->constrained();
            $table->string('pengiriman');
            $table->string('alamat');
            $table->date('tanggal_pengambilan');
            $table->string('metode_pembayaran');
            $table->string('buktiTransaksi');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};

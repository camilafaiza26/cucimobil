<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pelanggan_id')->unsigned()->index();
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans')->onDelete('cascade');
            $table->bigInteger('paket_id')->unsigned()->index();
            $table->foreign('paket_id')->references('id')->on('pakets')->onDelete('cascade');
            $table->bigInteger('merek_id')->unsigned()->index();
            $table->foreign('merek_id')->references('id')->on('mereks')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('plat', 8);
            $table->date('tanggal_pemesanan');
            $table->boolean('status_bayar');
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
        Schema::dropIfExists('pemesanans');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRincianPenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rincian_penjualan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id')->index();
            $table->unsignedBigInteger('penjualan_id')->index();
            $table->integer('total');
            $table->timestamps();

            $table->foreign('produk_id')->on('produk')->references('id')->onDelete('cascade');
            $table->foreign('penjualan_id')->on('penjualan')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rincian_penjualan');
    }
}

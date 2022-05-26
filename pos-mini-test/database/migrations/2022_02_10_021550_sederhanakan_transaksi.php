<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SederhanakanTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Drop Table
        Schema::dropIfExists('rincian_pembelian');
        Schema::dropIfExists('rincian_penjualan');

        // Update Table
        Schema::table('pembelian', function (Blueprint $table) {
            $table->unsignedBigInteger('produk_id')->index();
            $table->integer('total')->default('1')->after('tanggal');

            $table->foreign('produk_id')->on('produk')->references('id')->onDelete('cascade');
        });

        Schema::table('penjualan', function (Blueprint $table) {
            $table->unsignedBigInteger('produk_id')->index();
            $table->integer('total')->default('1')->after('tanggal');

            $table->foreign('produk_id')->on('produk')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('rincian_pembelian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id');
            $table->unsignedBigInteger('pembelian_id');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('produk_id')->on('produk')->references('id')->onDelete('cascade');
            $table->foreign('pembelian_id')->on('pembelian')->references('id')->onDelete('cascade');
        });

        Schema::create('rincian_penjualan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id');
            $table->unsignedBigInteger('penjualan_id');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('produk_id')->on('produk')->references('id')->onDelete('cascade');
            $table->foreign('penjualan_id')->on('penjualan')->references('id')->onDelete('cascade');
        });
    }
}

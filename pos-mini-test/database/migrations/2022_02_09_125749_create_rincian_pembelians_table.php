<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRincianPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rincian_pembelian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id')->index();
            $table->unsignedBigInteger('pembelian_id')->index();
            $table->integer('total');
            $table->timestamps();

            $table->foreign('produk_id')->on('produk')->references('id')->onDelete('cascade');
            $table->foreign('pembelian_id')->on('pembelian')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rincian_pembelian');
    }
}

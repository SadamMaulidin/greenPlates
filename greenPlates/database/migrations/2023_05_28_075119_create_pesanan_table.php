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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Process', 'Shipping', 'Accepted'])->default('Process');
            $table->time('estimasi');
            $table->timestamp('waktu_pemesanan');
            $table->string('alamat_tujuan');
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_produk')
                  ->references('id')->on('produks')->onDelete('cascade');
            $table->foreign('id_user')
                  ->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('pesanan');
    }
};

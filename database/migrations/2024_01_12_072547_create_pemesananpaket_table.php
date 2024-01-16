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
        Schema::create('pemesananpaket', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->text('alamat');
            $table->string('no_hp');
            $table->unsignedBigInteger('paket_id'); // Ubah sesuai nama kolom yang sesuai dengan relasi
            $table->string('jenis_paket');
            $table->string('harga');
            $table->string('bukti_pembayaran')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes(); // Tambahkan kolom deleted_at


            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('paket_id')->references('id')->on('paket');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesananpaket');
    }
};

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
        Schema::create('makanan', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_makanan');
            $table->string('jenis_makanan');
            $table->string('nama_makanan');
            $table->double('kalori');
            $table->double('protein');
            $table->double('lemak');
            $table->double('karbohidrat');
            $table->string('foto');
            $table->double('harga');
            $table->text('deskripsi');
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
        Schema::dropIfExists('makanan');
    }
};

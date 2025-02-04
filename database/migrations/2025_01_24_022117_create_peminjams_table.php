<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamsTable extends Migration
{
    public function up()
    {
        Schema::create('peminjams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buku_id');
            $table->string('nama');
            $table->string('email')->unique();
            $table->date('tanggal_lahir');
            $table->string('nomor_telepon');
            $table->string('agama');
            $table->text('alamat');
            $table->timestamps();

            $table->foreign('buku_id')->references('id')->on('buku')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('peminjams');
    }
}

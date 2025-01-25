<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgamasTable extends Migration
{
    public function up()
    {
        Schema::create('agamas', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agamas');
    }
}

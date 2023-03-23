<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenidosTable extends Migration
{
    public function up()
    {
        Schema::create('contenidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('perfil')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

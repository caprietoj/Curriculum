<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionPersonalsTable extends Migration
{
    public function up()
    {
        Schema::create('informacion_personals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->string('profesion')->nullable();
            $table->string('pagina_web')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

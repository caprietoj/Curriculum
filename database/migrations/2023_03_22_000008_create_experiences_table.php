<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('empresa')->nullable();
            $table->string('cargo')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_final')->nullable();
            $table->longText('descripcion_del_cargo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

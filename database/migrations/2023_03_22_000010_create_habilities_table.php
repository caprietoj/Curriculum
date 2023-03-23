<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabilitiesTable extends Migration
{
    public function up()
    {
        Schema::create('habilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->longText('descripcion')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

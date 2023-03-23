<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInformacionPersonalsTable extends Migration
{
    public function up()
    {
        Schema::table('informacion_personals', function (Blueprint $table) {
            $table->unsignedBigInteger('idiomas_id')->nullable();
            $table->foreign('idiomas_id', 'idiomas_fk_8221609')->references('id')->on('languages');
        });
    }
}

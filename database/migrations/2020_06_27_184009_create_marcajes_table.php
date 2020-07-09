<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcajes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_empleado');
            $table->time('hora_entrada');
            $table->time('hora_salida')->nullable();
            $table->date('fecha');
            $table->string('localizacion');
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
        Schema::dropIfExists('marcajes');
    }
}

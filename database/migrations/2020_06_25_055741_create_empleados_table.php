<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('apellido')->nullable();
            $table->integer('cedula')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('sexo', ['masculino','femenino','no especificado'])->nullable();
            $table->enum('estado_civil',['soltero','casado'])->nullable();
            $table->integer('telefono')->nullable();
            $table->bigInteger('id_role');
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
        Schema::dropIfExists('empleados');
    }
}

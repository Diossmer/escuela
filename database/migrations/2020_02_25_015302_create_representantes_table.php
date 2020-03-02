<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepresentantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('apellido');
            $table->string('segundo_apellido')->nullable();
            $table->string('cedula');
            $table->string('email')->unique();
            $table->date('fecha_nacimiento');
            $table->string('trabajo')->nullable();
            $table->string('grado_instruccion')->nullable();
            $table->string('profesion_ocupacion')->nullable();
            $table->string('lugar_trabajo')->nullable();
            $table->string('telefono');
            $table->string('sexo');
            $table->unsignedBigInteger('docente_id');
            $table->foreign('docente_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('representantes');
    }
}

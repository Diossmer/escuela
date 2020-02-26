<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fotos');
            $table->string('nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('apellido');
            $table->string('segundo_apellido')->nullable();
            $table->string('lugar_nacimiento');
            $table->text('direccion');
            $table->string('fecha');
            $table->string('cedula')->nullable();
            $table->string('email')->nullable();
            $table->string('sexo');
            $table->string('camisa');
            $table->string('pantalon');
            $table->string('zapato');
            $table->string('enfermedades_padecida')->nullable();
            $table->string('enfermedades_psicologica')->nullable();
            $table->unsignedBigInteger('representante_id');
            $table->foreign('representante_id')->references('id')->on('representantes')->onDelete('cascade');
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
        Schema::dropIfExists('alumnos');
    }
}

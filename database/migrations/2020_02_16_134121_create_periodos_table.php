<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('periodo_desde');
            $table->timestamp('periodo_hasta');
            $table->date('fecha_inicio');
            $table->decimal('resultado')->nullable();
            $table->enum('estatus',['activo','inactivo','regular']);
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
        Schema::dropIfExists('periodos');
    }
}

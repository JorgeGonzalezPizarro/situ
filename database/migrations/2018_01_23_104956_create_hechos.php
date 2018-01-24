<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHechos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hechos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario');
            $table->string('tipo_hecho');
            $table->string('titulo_hecho');
            $table->string('curso');
            $table->string('contenido');
            $table->string('proposito');
            $table->string('evidencia');
            $table->string('etiquetas');
            $table->string('nivel_autorizacion');
            $table->string('hechos_relacionados');
            $table->timestamp('fecha_hecho');
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
        //
    }
}

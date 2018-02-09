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
            $table->string('etiquetas')->nullable();
            $table->string('nivel_autorizacion')->nullable();;
            $table->string('hechos_relacionados')->nullable();;
            $table->timestamp('fecha_hecho')->nullable();;
            $table->string('ruta_imagen')->nullable();;

            $table->timestamps();
        });


        Schema::create('etiquetas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('slug')->unique();
            $table->string('color');

            $table->timestamps();
        });

        Schema::create('hecho_etiqueta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hecho_id')->unsigned()->index();
            $table->integer('etiqueta_id')->unsigned()->index();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('etiquetas');
        Schema::drop('users');
        Schema::drop('hecho_etiqueta');

    }
}

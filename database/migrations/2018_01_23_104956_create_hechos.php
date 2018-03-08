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
            $table->integer('user_id')->unsigned()->index();
            $table->integer('categoria_id')->unsigned()->index();
            $table->string('titulo_hecho')->nullable();
            $table->string('curso')->nullable();
            $table->longText ('contenido')->nullable();
            $table->string('proposito')->nullable();
            $table->string('evidencia')->nullable();
            $table->string('etiqueta')->nullable();
            $table->string('nivel_acceso')->default('1');
            $table->string('hechos_relacionados')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string('ruta_imagen')->nullable();
            $table->string('publico')->nullable();

            $table->timestamps();
        });


        Schema::create('etiqueta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('nombre');
            $table->string('slug')->unique();
            $table->string('color')->nullable();

            $table->timestamps();
        });

        Schema::create('hecho_etiqueta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hechos_id')->unsigned()->index();
            $table->integer('etiqueta_id')->unsigned()->index();

        });

        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categoria');
            $table->string('nivel_acceso')->nullable();
            $table->integer('user_id')->unsigned()->index()->nullable();

            $table->timestamps();


        });
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_hechos');
            $table->string('calificacion')->nullable();
            $table->string('asignatura')->nullable();
            $table->string('profesor')->nullable();




        });

        Schema::create('invitados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invitado_id');
            $table->integer('alumno_id');
            $table->string('nivel_acceso');

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
        Schema::drop('etiqueta');
        Schema::drop('hecho_etiqueta');

    }
}

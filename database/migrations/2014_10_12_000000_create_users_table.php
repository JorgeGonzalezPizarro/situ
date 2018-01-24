<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Http\Controllers\Auth\RegisterController;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('rol');
            $table->string('nombre_rol');
            $table->rememberToken();
            $table->timestamps();
        });


        $array = [
            'name' => 'ADMIN',
            'email' => 'ADMIN@gmail.com',
            'password'=> '1',
            'rol'=>'1',
            'nombre_rol'=>'Administrador',
        ];


        app('\App\Http\Controllers\Auth\RegisterController')->create($array);
        //        DB::table('users')->insert([
//
//            'name' => 'ADMIN',
//            'email' => 'ADMIN@gmail.com',
//            'password'=> bcrypt('ADMIN'),
//            'rol'=>'1',
//            'nombre_rol'=>'Administrador',
//
//        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

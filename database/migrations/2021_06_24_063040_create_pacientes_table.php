<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Se deja en ingles por convención para poder acceder a los métodos por defecto sin tener que escribir más código
            $table->string('apellido');
            $table->string('cedula')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('telefono')->nullable();
            $table->string('direccion');
            $table->date('fechaNacimiento');
            ///////////////////// Campos para relacionar las tablas //////////////////////////////
            ///////////////////// Relación con ciudad     //////////////////////////////
            $table->unsignedBigInteger('ciudad_id');/// Esto llama a la tabla Ciudades. Como se usa el id por defecto, no es necesario identificar el campo al que se va a llamar, caso contrario se debe colocar dicho campo.
            $table->foreign('ciudad_id')
                ->references('id')
                ->on('ciudads'); /// Con esto se restringe que el id debe estar en la tabla ciudades, y no se puede colocar cualquier id 
                //->onDelete('cascade'); /// Al eliminar el usuario, se elimina el registro completo

            ///////////////////// Relación  con genero     //////////////////////////////
            $table->unsignedBigInteger('genero_id');
            $table->foreign('genero_id')
                ->references('id')
                ->on('generos')
                ->onDelete('cascade');
            
            $table->unsignedBigInteger('cliente_id')->unique()->nullable()
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
                     
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
        Schema::dropIfExists('pacientes');
    }
}
